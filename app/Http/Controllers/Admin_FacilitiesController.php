<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Facility;

class Admin_FacilitiesController extends Controller
{
    public function showFacilities(){
        // ดึงข้อมูลจากตาราง facilities
        $facilities = DB::table('facilities')
            ->whereNull('deleted_at')
            ->get();
    
        return view("admin.admin_facility", compact('facilities'));
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

        // ตรวจสอบการอัปโหลดไฟล์รูปภาพ
        if ($request->hasFile('picture_path')) {
            // ลบรูปเก่าก่อนถ้ามี
            if ($facility->picture_path && Storage::exists('public/' . $facility->picture_path)) {
                Storage::delete('public/' . $facility->picture_path);
            }

            // อัปโหลดรูปภาพใหม่
            $file = $request->file('picture_path');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('facility_pictures', $fileName . '.' . $extension, 'public');

            // บันทึกเส้นทางรูปภาพใหม่ในคอร์ส
            $facility->picture_path = $filePath;
        }
        $facility->save();

        return redirect('/admin/facility');
    }
    
    public function delete(Request $request){
        $facility = Facility::find($request->facility_id);
        if ($facility) {
            $facility->delete();
        }
        return redirect('admin/facility');
    }
}

