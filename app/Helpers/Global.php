<?php
if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {

            if (auth()->user()->role->slug == 'admin') {

                return 'admin.dashboard';
            }
            return 'user.profile';
        }
        return 'login';
    }

    if (!function_exists('uploadToLocal')){

        function uploadToLocal($KeyFile,$fileTmp,$fileContent="",$private=''){


//                if(strpos($KeyFile, 'service') !== false){
//                    return 'pl';
//                    $folder = "service";
//                }else{
//                    $folder = "admin_area";
//                }

                $KeyFile = str_replace("languages_images","languages/images", $KeyFile);

                if(empty($fileContent)){
                    move_uploaded_file($fileTmp,"/storage/app/public/$KeyFile");
                } else {
                    file_put_contents("/storage/app/public/$KeyFile", $fileContent);
                }
                return true;

        }
    }


}
