<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Admin_CustomerController extends Controller
{
    public function showCustomers(){
        $customers = DB::table('customers')
        ->whereNull('deleted_at') // ดึงเฉพาะแถวที่ deleted_at เป็น null
        ->get();
        return view("admin.admin_customer", compact('customers'));
    }

    // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขลูกค้า
    public function showCustomerForm($id = null){
        // ถ้ามี $id ให้ดึงข้อมูลลูกค้ามาแก้ไข
        $customer = $id ? Customer::find($id) : null;

        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มลูกค้า
        return view('admin.admin_addcustomer', compact('customer'));
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลลูกค้า (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null){
        // ถ้ามี $id ให้แก้ไขข้อมูลลูกค้า
        $customer = $id ? Customer::find($id) : new Customer();

        // ตั้งค่าคุณสมบัติของลูกค้า
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phonenum = $request->phonenum;
        $customer->address = $request->address;
        $customer->birthdate = $request->birthdate;
        $customer->gender = $request->gender;
        $customer->weight = $request->weight;
        $customer->height = $request->height;

        // เฉพาะในกรณีที่เป็นการเพิ่มลูกค้าใหม่ (ไม่มี $id)
        if (!$id) {
            // เข้ารหัสรหัสผ่านด้วย Hash::make()
            $customer->password = Hash::make($request->password);
        }

        // ตรวจสอบการอัปโหลดไฟล์รูปภาพ
        if ($request->hasFile('profile_picture')) {
            // ลบรูปเก่าก่อนถ้ามี
            if ($customer->profile_picture && Storage::exists('public/' . $customer->profile_picture)) {
                Storage::delete('public/' . $customer->profile_picture);
            }

            // อัปโหลดรูปภาพใหม่
            $file = $request->file('profile_picture');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('customer_pictures', $fileName . '.' . $extension, 'public');

            // บันทึกเส้นทางรูปภาพใหม่ในคอร์ส
            $customer->profile_picture = $filePath;
        }
        $customer->save();

        // ส่งผลลัพธ์กลับหลังบันทึกเสร็จ
        return redirect('/admin/customer');
    }

    public function delete(Request $request){
        $customer = Customer::find($request->customer_id);
        if ($customer) {
            $customer->delete();
        }
        return redirect('admin/customer');
    }    
}