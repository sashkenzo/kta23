<?php
namespace App\Traits;


use Illuminate\Http\Request;

trait datatablesTrait{

    public function datatableActionShow($query,$route,$type){
        $showBtn="<a href='".route($route.'.show',$query->$type)."' class='btn btn-success btn-sm m-1'><svg width='16' height ='16' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M13 17V20H18V22H6V20H11V17H4C3.44772 17 3 16.5523 3 16V4H2V2H22V4H21V16C21 16.5523 20.5523 17 20 17H13ZM5 15H19V4H5V15ZM10 6L15 9.5L10 13V6Z'></path></svg></a>";
        return $showBtn;
    }
        public function datatableAction($query,$route,$type){

        $editBtn="<a href='".route($route.'.edit',$query->$type)."' class='btn btn-primary btn-sm mr-2'><svg width='16' height ='16' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z'></path></svg></a>";

        $delBtn="<form action='".route($route.'.delete',$query->$type)."' method='POST'>
                ".csrf_field()."
                ".method_field('DELETE')."
        <button type='button' class='btn btn-danger btn-sm mr-2' data-bs-toggle='modal' data-bs-target='#delete-line'>
            <svg width='16' height ='16' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z'></path></svg>
        </button>
        <div class='modal fade' id='delete-line' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='staticBackdropLabel'>Confirm</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                    Confirm delete
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'>Cancel</button>
                        <button type='submit' class='btn btn-outline-success'>Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </form>";
        return $editBtn.$delBtn;
    }
    public function datatableImage($query,){
        return $image="<img width='100' height ='100' src='".asset($query->image)."' alt='picture'>";
    }
    public function datatableCountSub($query,$subcat){
        return $count= $subcat::where('navbar_id',$query->id)->count();
    }
    public function datatableStatus($query,$route,$type)
    {
        if ($query->status) {
            $k= "btn-success";
            $v="0";
            $s="Active";
        } else {
            $k= "btn-danger";
            $v="1";
            $s="Inactive";
        }
        return $status = "<form action='" . route($route . '.changestatus', $query->$type) . "' method='POST'>
            " . csrf_field() . "
            " . method_field('PUT')."
            <button class='btn ".$k."' type='submit' name='status' value='".$v."'>".$s."</button>
            </form>";
    }


}
