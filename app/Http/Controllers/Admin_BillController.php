<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Admin_BillController extends Controller
{
    public function showbill()
    {
        // ดึงข้อมูลบิลที่ได้รับการอนุมัติแล้ว (payment_status = 1)
        $approvedBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status')
            ->where('enrolls.payment_status', '=', 1) // เงื่อนไขที่แสดงบิลที่อนุมัติแล้ว
            ->get();

        // ดึงข้อมูลบิลที่ยังไม่ได้รับการอนุมัติ (payment_status = 0)
        $pendingBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status')
            ->where('enrolls.payment_status', '=', 0) // เงื่อนไขที่แสดงบิลที่ยังไม่ได้อนุมัติ
            ->get();

        // ส่งข้อมูลทั้งสองตัวแปรไปยัง View
        return view("admin.admin_bill", compact('approvedBills', 'pendingBills'));
    }

    // ฟังก์ชันสำหรับอนุมัติบิล
    public function approveBill($id)
    {
        // ค้นหาบิลที่ต้องการอนุมัติ
        DB::table('enrolls')
            ->where('id', $id)
            ->update(['payment_status' => 1]); // อัปเดตสถานะเป็นอนุมัติ (1)

        return redirect()->back()->with('success', 'บิลถูกอนุมัติแล้ว');
    }

    // ฟังก์ชันลบข้อมูลบิล
    public function delete($id)
    {
        // ลบข้อมูลบิลตาม ID
        DB::table('bills')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'บิลถูกลบเรียบร้อยแล้ว');
    }
}
