<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Facility;
use App\Models\Facility_pic;

class Admin_FacilitiesController extends Controller
{
    public function showFacilities()
    {
        $facilities = $this->allFacilities(); // เปลี่ยนชื่อฟังก์ชันให้สื่อถึงข้อมูลสิ่งอำนวยความสะดวก
        return view("admin.admin_facility", compact('facilities'));
    }

    public function allFacilities()
    {
        // ดึงข้อมูลจากตาราง facilities
        $facilities = DB::table('facilities')->select('id', 'facility_name', 'facility_amount', 'description')->get();
        return $facilities; // คืนค่าข้อมูลสิ่งอำนวยความสะดวก
    }

    // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขสิ่งอำนวยความสะดวก
    public function showFacilityForm($id = null)   {
        // ถ้ามี $id ให้ดึงข้อมูลสิ่งอำนวยความสะดวกมาแก้ไข
        $facility = $id ? Facility::find($id) : null;
    
        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มสิ่งอำนวยความสะดวก
        return view('admin.admin_addfacility', compact('facility'));
    }
    
    // ฟังก์ชันสำหรับบันทึกข้อมูลสิ่งอำนวยความสะดวก (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null){
        // ตรวจสอบว่ามีการแก้ไขหรือเพิ่มสิ่งอำนวยความสะดวกใหม่
        $facility = $id ? Facility::find($id) : new Facility();
    
        // ตั้งค่าคุณสมบัติของสิ่งอำนวยความสะดวก
        $facility->facility_name = $request->facility_name;
        $facility->facility_amount = $request->facility_amount;
        $facility->description = $request->description;
    
        // บันทึกข้อมูลสิ่งอำนวยความสะดวกลงฐานข้อมูล
        $facility->save();
    
        // ถ้ามีการอัปโหลดรูปภาพใหม่
        if ($request->hasFile('facility_pics')) {
            $file = $request->file('facility_pics'); // รับไฟล์เดียว
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('facility_pictures', $fileName . '.' . $extension, 'public');
            
            // บันทึกรูปภาพที่อัปโหลดในตาราง FacilityPic
            $facilityPic = new Facility_pic;
            $facilityPic->facility_id = $facility->id;
            $facilityPic->picture_path = $filePath;
            $facilityPic->save();
        }
        return redirect('/admin/facility');
    }
    
    public function delete(Request $request){
        $course = Facility::find($request->facility_id);
        if ($course) {
            $course->delete();
        }
        return redirect('admin/facility');
    }
}

