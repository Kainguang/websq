<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Course;

class Admin_BillController extends Controller
{
    public function showbill(){
        // ดึงข้อมูลบิลที่ได้รับการอนุมัติแล้ว (payment_status = 1)
        $approvedBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'enrolls.customer_id', 'enrolls.course_id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at')
            ->where('enrolls.payment_status', '=', 1)
            ->orderBy('enrolls.updated_at', 'desc')
            ->get();
    
        // ดึงข้อมูลบิลที่ยังไม่ได้รับการอนุมัติ (payment_status = 0)
        $pendingBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at')
            ->where('enrolls.payment_status', '=', 0)
            ->orderBy('enrolls.created_at', 'desc')
            ->get();
    
        // ดึงข้อมูลบิลที่รอยืนยันการยกเลิก (payment_status = 2)
        $pendingCancelBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at')
            ->where('enrolls.payment_status', '=', 2)
            ->orderBy('enrolls.updated_at', 'desc')
            ->get();
    
        // ดึงข้อมูลบิลที่ยืนยันการยกเลิกแล้ว (payment_status = 3)
        $cancelledBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at')
            ->where('enrolls.payment_status', '=', 3)
            ->orderBy('enrolls.updated_at', 'desc')
            ->get();
    
        return view('admin.admin_bill', compact('approvedBills', 'pendingBills', 'pendingCancelBills', 'cancelledBills'));
    }
    
    // ฟังก์ชันสำหรับอนุมัติบิล
    public function approveBill($id)
    {
        // ดึงข้อมูลการจองจาก enrolls เพื่อหาคอร์สและระยะเวลา
        $enroll = DB::table('enrolls')
        ->join('courses', 'enrolls.course_id', '=', 'courses.id')
        ->where('enrolls.id', $id)
        ->select('enrolls.*', 'courses.period') // ดึงระยะเวลาคอร์ส (period) ด้วย
        ->first();

        // อัปเดตสถานะการชำระเงินพร้อมกับบันทึกวันที่เริ่มต้นและสิ้นสุดการเรียนในคราวเดียว
        DB::table('enrolls')
            ->where('id', $id)
            ->update([
                'payment_status' => 1,  // อัปเดตเป็นอนุมัติ
                'start_day' => now(),  // วันที่เริ่มเรียน (วันนี้)
                'end_day' => now()->addWeeks($enroll->period), // วันที่สิ้นสุดการเรียน เพิ่มตาม period
                'updated_at' => now() // อัปเดตวันที่แก้ไขล่าสุด
            ]);
        return redirect('admin/bill');
    }

    public function approveCancel($id){
        // ค้นหาข้อมูลการจอง
        $enroll = DB::table('enrolls')->where('id', $id)->first();

        // อัปเดตสถานะการจองเป็นยืนยันการยกเลิก (payment_status = 3)
        DB::table('enrolls')
            ->where('id', $id)
            ->update([
                'payment_status' => 3,  // อัปเดตสถานะเป็น "ยืนยันการยกเลิก"
                'course_status' => 2,   // อัปเดตสถานะเป็น "ถูกยกเลิก"
                'updated_at' => now()  // อัปเดตวันที่ล่าสุด
            ]);

        return redirect('admin/bill');
    }

    // ฟังก์ชันสำหรับแสดงฟอร์มแก้ไขการลงทะเบียน
    public function edit($customer_id, $course_id){
        // ดึงข้อมูลลูกค้า
        $customer = Customer::find($customer_id);
    
        // ดึงข้อมูลคอร์ส พร้อมกับข้อมูลเทรนเนอร์ (join ตาราง employees)
        $course = Course::join('employees', 'courses.employee_id', '=', 'employees.id')
                        ->select('courses.*', 'employees.firstname as trainer_firstname', 'employees.lastname as trainer_lastname')
                        ->where('courses.id', $course_id)
                        ->first();
    
        // ดึงคอร์สทั้งหมดเพื่อเลือกใน dropdown
        $allCourses = Course::all();
        
        // ดึงข้อมูลการลงทะเบียนจาก pivot table (enrollments)
        $enrollment = $customer->courses()->where('course_id', $course_id)->first();
        
        return view('admin.admin_editbill', compact('customer', 'course', 'enrollment', 'allCourses'));
    }

    public function update(Request $request, $customer_id, $course_id){
        // ดึงข้อมูลลูกค้าและคอร์สที่เกี่ยวข้อง
        $customer = Customer::find($customer_id);

        // อัปเดตข้อมูลใน pivot table (enrollments) สำหรับคอร์สใหม่
        $customer->courses()->updateExistingPivot($request->input('course_id'), [
            'course_status' => $request->input('course_status'),
            'payment_status' => $request->input('payment_status'),
        ]);

        return redirect('/admin/bill');
    }

    // ฟังก์ชันลบข้อมูลบิล
    public function delete($id)
    {
        // ลบข้อมูลบิลตาม ID
        DB::table('enrolls')->where('id', $id)->delete();
        return redirect('admin/bill');
    }
}
