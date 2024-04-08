<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Requests\UserRequest;

class UserController extends Controller
{
        public function contactForm(Request $req){
                $req->validate([
                        'name'=>'required',
                        'email'=>'required|email',
                        'phone_no'=>'required|numeric',
                        'message'=>'required',
                        'latitude'=>'required',
                        'longitude'=>'required',
                ]);
                //         'name.required'=>'Name is mandatory',
                //         'email.required'=>'Email is mandatory field',
                //         'email.email'=>'Email field contain @ symbol',
                // ]);
                $user_input= DB::table('tb_contact')->insert([
                'name'=> $req->name,
                'email'=>$req->email,
                'contact_no'=> $req->phone_no,
                'message'=> $req->message,
                'latitude'=>$req->latitude,
                'longitude'=>$req->longitude
                ]);
                return redirect()->route('contactUs')->with('message', 'Data inserted successfully!');
        }
        public function showContact(Request $req){
                $search= $request['search'] ?? "";
                if( $search != ""){
                        $user_data= DB::table('tb_contact')->where('name','like','%.$search.%')->orWhere('email','LIKE','%$search%')
                        ->get(); 
                }
                else{
                        $user_data= DB::table('tb_contact')
                        ->orderBy('id')
                        ->cursorPaginate(6);
                }
                return view('showContact',['data' => $user_data]);
        }
        public function editDetails($id){
                $user_update= DB::table('tb_contact')
                ->where('id',$id)
                ->get();
                return view('edit',['data' => $user_update]);
        }
        public function update(Request $req){
                $req->validate([
                        'name'=>'required',
                        'email'=>'required|email',
                        'phone_no'=>'required|numeric',
                        'message'=>'required',
                ]);
                $user_update= DB::table('tb_contact')
                ->where('id', $req->update_id)
                ->update([
                        'name'=> $req->name,
                        'email'=> $req->email,
                        'contact_no'=> $req->phone_no,
                        'message'=> $req->message,
                ]);
                return redirect()->route('contactUs')->with('message', 'Your Information Updated successfully!');
        }
        public function deleteContact($id){ 
                $user_update= DB::table('tb_contact')
                ->where('id',$id)
                ->delete();
                return redirect()->route('contactUs')->with('message', 'Record Deleted successfully!');
               
        }
        public function delete($id){
                ?>
                <script>
                    if(confirm("Are you sure you want to delete?")) {
                        // If user confirms, proceed with the deletion
                        window.location.href = "<?php echo route('deleteContact', ['id' => $id]); ?>";
                    } else {
                        // If user cancels, do nothing or handle accordingly
                    }
                </script>
                <?php
            }
            public function addImage(Request $req)
            {
                $req->validate([
                    'type' => 'required',
                    'image' => 'required|image|mimes:png,jpeg'
                ]);
            
                if ($req->hasFile('image') && $req->file('image')->isValid()) {
                        $imagePath = $req->file('image')->store('public/Gallery');
                        $file_name= basename($imagePath);
                        $img = DB::table('tb_gallery')->insert([
                            'type' => $req->type,
                            'image' => $file_name,
                            'created_at' => now(),
                            'updated_at' => now() 
                        ]);
                        return redirect()->route('show-image')->with('message', 'Gallery image added.');
                    } else {
                        return redirect()->route('show-image')->with('message', 'Some error occurred.');
                    }
                    
            }
            
            public function showImage( $id = 0) {
                // echo "<script>alert('{{ $id }}');</script>";
                if ($id == 0) {
                    $dataG = DB::table('tb_gallery')->orderBy('id','desc')->get();
                } else {
                    $dataG = DB::table('tb_gallery')->where('type', $id)->orderBy('id','desc')->get();
                }
                return view('gallery', ['Gdata' => $dataG]);
            }
}
?>
