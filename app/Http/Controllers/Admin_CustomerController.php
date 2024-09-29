<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin_CustomerController extends Controller
{
    public function showCustomers()
    {
        $customers = $this->allCustomers();
        return view("admin.admin_customer", compact('customers'));
    }
    public function allCustomers()
    {
        // ดึงเฉพาะข้อมูลลูกค้าที่ไม่ได้ถูกลบ (deleted_at เป็น null)
        $customers = DB::table('customers')
        ->whereNull('deleted_at') // ดึงเฉพาะแถวที่ deleted_at เป็น null
        ->get();
        return $customers; // คืนค่าข้อมูลลูกค้า
    }

    // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขลูกค้า
    public function showCustomerForm($id = null)
    {
        // ถ้ามี $id ให้ดึงข้อมูลลูกค้ามาแก้ไข
        $customer = $id ? Customer::find($id) : null;

        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มลูกค้า
        return view('admin.admin_addcustomer', compact('customer'));
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลลูกค้า (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null)
    {
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

        // บันทึกข้อมูลลูกค้าลงฐานข้อมูล
        $customer->save();

        // ส่งผลลัพธ์กลับหลังบันทึกเสร็จ
        return redirect('/admin/customer');
    }

    // public function showAddCustomerForm()
    // {
    //     $customer = DB::table('customers')->get();
    //     return view('admin.admin_addcustomer');
    // }

    // // ฟังก์ชันบันทึกข้อมูลผู้ใช้งาน
    // public function storeCustomer(Request $request)
    // {
    //     // สร้างข้อมูลเทรนเนอร์ใหม่b
    //     $new_customer = new Customer();
    //     $new_customer->firstname = $request->firstname;
    //     $new_customer->lastname = $request->lastname;
    //     $new_customer->email = $request->email;
    //     $new_customer->password = Hash::make($request->password); // เข้ารหัสรหัสผ่าน
    //     $new_customer->phonenum = $request->phonenum;
    //     $new_customer->address = $request->address;
    //     $new_customer->birthdate = $request->birthdate;
    //     $new_customer->weight = $request->weight;
    //     $new_customer->height = $request->height;
    //     $new_customer->gender = $request->gender;

    //     // บันทึกรูปโปรไฟล์ (หากมีการอัพโหลด)
    //     if ($request->hasFile('profile_picture')) {
    //         $file = $request->file('profile_picture');
    //         // $filename = $file->getClientOriginalName();
    //         $filePath = $file->store('profile_pictures','public');
    //         $new_customer->profile_picture = $filePath;
    //     }
    //     $new_customer->save(); // บันทึกข้อมูลลงในฐานข้อมูล

    //     // กลับไปที่หน้ารายชื่อผู้ใช้งานพร้อมข้อความสำเร็จ
    //     return redirect('admin/customer');
    // }

    public function delete(Request $request){
        $customer = Customer::find($request->customer_id);
        if ($customer) {
            $customer->delete();
        }
        return redirect('admin/customer');
    }
    
    }

    


