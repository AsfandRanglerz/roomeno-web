<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProtectBuyer;
use Illuminate\Http\Request;
use App\Models\ProtectSeller;
use App\Models\RoomenoBenefit;
use App\Models\TrustAndSafety;
use App\Models\RealReservation;
use App\Models\UserRolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TrustAndSafetyController extends Controller
{
    public function trustIntroIndex()
    {
        $intros = TrustAndSafety::get();

        return view('admin.trust&safety.introduction.index', compact('intros'));
    }

    public function trustIntroEdit($id)
    {
        $intro = TrustAndSafety::findOrFail($id);
        return view('admin.trust&safety.introduction.edit', compact('intro'));
    }

    public function trustIntroUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $intro = TrustAndSafety::findOrFail($id);
        $intro->description = $request->input('description');
        $intro->save();

        return redirect()->route('trustintro.index')->with('success', 'Introduction updated successfully');
    }

    public function protectBuyerIndex()
    {
        $protect = ProtectBuyer::wherenotNull('image')->first();
        return view('admin.trust&safety.protectourbuyer.index', ['protect' => $protect]);
    }

    public function protectBuyerEdit($id)
    {
       $protect = ProtectBuyer::findOrFail($id);
        return view('admin.trust&safety.protectourbuyer.edit', compact('protect'));
    }

    public function protectBuyerUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $protect = ProtectBuyer::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $protect->image = $imagePath;
    }
        $protect->save();
        
        return redirect()->route('protectbuyer.index')->with('success', 'We protect our buyers updated successfully.');
    }

    public function protectBuyerShow($id)
    {
        $protects = ProtectBuyer::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.trust&safety.protectourbuyer.show', compact('protects'));
    }

    public function protectBuyerShowEdit($id)
    {
       $protects = ProtectBuyer::findOrFail($id);
        return view('admin.trust&safety.protectourbuyer.editshow', compact('protects'));
    }

    public function protectBuyerShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $protect = ProtectBuyer::findOrFail($id);
        $protect->title = $request->input('title');
        $protect->description = $request->input('description');
        $protect->save();
        
        return redirect()->route('protectbuyer.show', $id)->with('success', 'We protect our buyers updated successfully.');
    }

     public function protectSellerIndex()
    {
        $protect = ProtectSeller::wherenotNull('image')->first();
        return view('admin.trust&safety.protectourseller.index', ['protect' => $protect]);
    }

    public function protectSellerEdit($id)
    {
       $protect = ProtectSeller::findOrFail($id);
        return view('admin.trust&safety.protectourseller.edit', compact('protect'));
    }

    public function protectSellerUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $protect = ProtectSeller::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $protect->image = $imagePath;
    }
        $protect->save();
        
        return redirect()->route('protectseller.index')->with('success', 'We protect our sellers updated successfully.');
    }

    public function protectSellerShow($id)
    {
        $protects = ProtectSeller::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.trust&safety.protectourseller.show', compact('protects'));
    }

    public function protectSellerShowEdit($id)
    {
       $protects = ProtectSeller::findOrFail($id);
        return view('admin.trust&safety.protectourseller.editshow', compact('protects'));
    }

    public function protectSellerShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $protect = ProtectSeller::findOrFail($id);
        $protect->title = $request->input('title');
        $protect->description = $request->input('description');
        $protect->save();
        
        return redirect()->route('protectseller.show', $id)->with('success', 'We protect our sellers updated successfully.');
    }

    public function realReservationIndex()
    {
        $reservation = RealReservation::wherenotNull('image')->first();
        return view('admin.trust&safety.notrealreservation.index', ['reservation' => $reservation]);
    }

    public function realReservationEdit($id)
    {
       $reservation = RealReservation::findOrFail($id);
        return view('admin.trust&safety.notrealreservation.edit', compact('reservation'));
    }

    public function realReservationUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $reservation = RealReservation::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $reservation->image = $imagePath;
    }
        $reservation->save();
        
        return redirect()->route('realreservation.index')->with('success', 'Verified reservations updated successfully.');
    }

    public function realReservationShow($id)
    {
        $reservations = RealReservation::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.trust&safety.notrealreservation.show', compact('reservations'));
    }

    public function realReservationShowEdit($id)
    {
       $reservations = RealReservation::findOrFail($id);
        return view('admin.trust&safety.notrealreservation.editshow', compact('reservations'));
    }

    public function realReservationShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $reservation = RealReservation::findOrFail($id);
        $reservation->title = $request->input('title');
        $reservation->description = $request->input('description');
        $reservation->save();
        
        return redirect()->route('realreservation.show', $id)->with('success', 'Verified reservations updated successfully.');
    }

     public function roomenoBenefitsIndex()
    {
        $benefit = RoomenoBenefit::wherenotNull('image')->first();
        return view('admin.trust&safety.roomenobenefit.index', ['benefit' => $benefit]);
    }

    public function roomenoBenefitsEdit($id)
    {
       $benefit = RoomenoBenefit::findOrFail($id);
        return view('admin.trust&safety.roomenobenefit.edit', compact('benefit'));
    }

    public function roomenoBenefitsUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $benefit = RoomenoBenefit::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $benefit->image = $imagePath;
    }
        $benefit->save();
        
        return redirect()->route('roomenobenefits.index')->with('success', 'Roomeno benefits everyone updated successfully.');
    }

    public function roomenoBenefitsShow()
    {
        $data = RoomenoBenefit::wherenotNull('description')->first();
          $sideMenuPermissions = collect();

        // ✅ Check if user is not admin (normal subadmin)
        if (!Auth::guard('admin')->check()) {
        $user =Auth::guard('subadmin')->user()->load('roles');


        // ✅ 1. Get role_id of subadmin
        $roleId = $user->role_id;

        // ✅ 2. Get all permissions assigned to this role
        $permissions = UserRolePermission::with(['permission', 'sideMenue'])
            ->where('role_id', $roleId)
            ->get();

        // ✅ 3. Group permissions by side menu
        $sideMenuPermissions = $permissions->groupBy('sideMenue.name')->map(function ($items) {
            return $items->pluck('permission.name'); // ['view', 'create']
        });
    }


        return view('admin.trust&safety.roomenobenefit.show', compact('data',  'sideMenuPermissions'));
    }


    public function roomenoBenefitsShowEdit()
    {
        $data = RoomenoBenefit::first();
        
        return view('admin.trust&safety.roomenobenefit.editshow', compact('data'));
    }

    public function roomenoBenefitsShowUpdate(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'description' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }
        $data = RoomenoBenefit::first();
        // RoomenoBenefit::find($data->id)->update($request->all());
        if ($data) {
            $data->update($request->all());
        } else {
            RoomenoBenefit::create($request->all());
        }
        return redirect('/admin/roomeno-benefits-everyone-show/'. $data->id)->with('success', 'Roomeno benefits everyone updated successfully.');
    }


}
