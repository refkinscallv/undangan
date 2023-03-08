<?php

    Class Ghelper {

        function numshort($n, $precision = 1){
            if ($n < 900) {
                $n_format = number_format($n, $precision);
                $suffix = '';
            } else 
            if ($n < 900000) {
                $n_format = number_format($n / 1000, $precision);
                $suffix = ' Rb';
            } else 
            if ($n < 900000000) {
                $n_format = number_format($n / 1000000, $precision);
                $suffix = ' Jt';
            } else 
            if ($n < 900000000000) {
                $n_format = number_format($n / 1000000000, $precision);
                $suffix = ' M';
            } else {
                $n_format = number_format($n / 1000000000000, $precision);
                $suffix = ' T';
            }
    
            if($precision > 0){
                $dotzero = '.'. str_repeat( '0', $precision );
                $n_format = str_replace( $dotzero, '', $n_format );
            }
            return $n_format . $suffix;
        }
    
        function sizeshort($size){
            $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            $power = $size > 0 ? floor(log($size, 1024)) : 0;
            return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
        }
    
        function unique_file($path, $filename) {
            $file_parts = explode(".", $filename);
            $ext = array_pop($file_parts);
            $name = implode(".", $file_parts);
    
            $i = 1;
            while (file_exists($path . $filename)) {
                $filename = $name . '-' . ($i++) . '.' . $ext;
            }
            return $filename;
        }
    
        function form_validate($form_val, $form_type, $form_length = 6){
            switch($form_type){
                case "alpha"                : 
                    if(!preg_match("/^[a-zA-Z\s._-]+$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                    break;
                case "numeric"              : 
                    if(!preg_match("/^[0-9-' ]*$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                    break;
                case "length"               : 
                    if(strlen($form_val) < $form_length){
                        $result = "length";
                    } else {
                        $result = $form_val;
                    }
                    break;
                case "email"                : 
                    if(!filter_var($form_val, FILTER_VALIDATE_EMAIL)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                    break;
                case "alpha-length"         : 
                    if(strlen($form_val) < $form_length){
                        $result = "length";
                    } else {
                        if(!preg_match("/^[a-zA-Z\s._-]+$/", $form_val)){
                            $result = "regex";
                        } else {
                            $result = $form_val;
                        }
                    }
                    break;
                case "numeric-length"       : 
                    if(strlen($form_val) < $form_length){
                        $result = "length";
                    } else {
                        if(!preg_match("/^[0-9-' ]*$/", $form_val)){
                            $result = "regex";
                        } else {
                            $result = $form_val;
                        }
                    }
                    break;
                case "alpha-numeric"        : 
                    if(!preg_match("/^[a-zA-Z0-9\s._-]+$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                    break;
                case "alpha-numeric-length" : 
                    if(strlen($form_val) < $form_length){
                        $result = "length";
                    } else {
                        if(!preg_match("/^[a-zA-Z0-9\s._-]+$/", $form_val)){
                            $result = "regex";
                        } else {
                            $result = $form_val;
                        }
                    }
                    break;
                case "date"                 :
                    if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $form_val)){
                        $result = "regex";
                    } else {
                        $result = $form_val;
                    }
                    break;
            }
    
            return $result;
        }
    
        function data_row($table, $where){
            $CI =& get_instance();
    
            if(is_array($where) === true){
                foreach($where as $id_key => $id_val){
                    $result2[]  = "$id_key = '$id_val'";
                }
    
                $result_where   = implode(" AND ", $result2);
            } else {
                $result_where   = $where;
            }
    
            $query_select   = $CI->db->query("SELECT * FROM $table WHERE $result_where");
    
            return $query_select->row();
        }
    
        function ajax_res($result){
            echo json_encode($result, JSON_UNESCAPED_SLASHES);
        }
    
        function post_preg($param){
            $string = str_replace(' ', '-', $param); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    
            return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        }
    
        function ipgeo(){
            $source     = file_get_contents("http://ip-api.com/json/?fields=61439");
            $source     = json_decode($source);
    
            return $source;
        }
    
        function ua(){
            $ss = json_decode(
                file_get_contents("https://www.useragentstring.com/?uas=". urlencode($_SERVER["HTTP_USER_AGENT"]) ."&getJSON=all")
            );
    
            return $ss;
        }
    
        function get_component($component){
            $CI =& get_instance();
    
            $CI->load->model([
                "M_theme"   => "theme",
                "M_post"    => "post"
            ]);
    
            $receptacle = "";
    
            $component_item = $CI->theme->component_item_bycomponent($component);
    
            foreach($component_item->result() as $item){
                switch($item->element_id){
                    case "1" : 
                        $element    = $CI->theme->element_html_js($item->element_id, $component)->row();
                        $receptacle .= "
                        ". (isset($element->title)? ($element->title != "")? "<div class='element-title' id='element-htmljs-title'>". $element->title ."</div>" : "" : "") ."
                        <div class='element-body' id='element-htmljs'>
                            ". $element->syntax ."
                        </div>";
                        break;
                    case "2" : 
                        $element    = $CI->theme->element_image($item->element_id, $component)->row();
                        $receptacle .= "
                        ". (isset($element->title)? ($element->title != "")? "<div class='element-title' id='element-image-title'>". $element->title ."</div>" : "" : "") ."
                        <div class='element-body' id='element-image'>
                            <a href='". $element->link ."' target='_blank' rel='unfollow'>
                                <img src='". base_url("images/". $element->image) ."' alt='". $element->title ."' width='100%'>
                            </a>
                        </div>";
                        break;
                    case "3" : 
                        $category   = $CI->post->category();
                        $receptacle .= "<div class='element-title' id='element-category-title'>Kategori</div>
                        <div class='element-body' id='element-category'>
                            <ul class='category-group'>";
                        if($category->result() == 0){
                            $receptacle .= "<li class='category-item'>Belum Ada Kategori</li>";
                        } else {
                            foreach($category->result() as $c){
                                $count  = $CI->post->article_by_category($c->name)->num_rows();
                                $receptacle .= "<li class='category-item'><a href='". base_url('category/'. $c->name) ."'>". $c->name ." (". $count .")</a></li>";
                            }
                        }
                        $receptacle .= "</ul>
                        </div>";
                        break;
                    case "4" : 
                        $element        = $CI->theme->element_comment($item->element_id, $component)->row();
                        $get_comment    = $CI->post->element_latest_comment(isset($element->row)? $element->row : 10)->result();
    
                        $receptacle .= "
                        ". (isset($element->title)? ($element->title != "")? "<div class='element-title' id='element-comment-title'>". $element->title ."</div>" : "" : "") ."
                        <div class='element-body' id='element-comment'>
                            <ul class='comment-group'>";
                        if($get_comment == 0){
                            $receptacle .= "<li class='comment-item'>Belum Ada Komentar</li>";
                        } else {
                            foreach($get_comment as $gc){
                                $receptacle .= "
                                <li class='comment-item'>
                                    <a href='". base_url(data_row("article", ["article_id" => $gc->article_id])->article_permalink) ."'>
                                        <span class='comment-item-name'><b>". htmlentities($gc->comment_name) ."</b></span>
                                        <span class='comment-item-date'>". date("Y-m-d", strtotime($gc->date_comment)) ."</span>
                                        <span class='comment-item-message'>". mb_strimwidth(htmlentities($gc->comment_message), 0, 100, "...") ."</span>
                                    </a>
                                </li>";
                            }
                        }
                        $receptacle .= "
                            </ul>
                        </div>";
                        break;
                    case "6" : 
                        $day = date('w');
                        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
                        $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    
                        $element        = $CI->theme->element_popular_post($item->element_id, $component)->row();
                        $get_article    = $CI->post->popular_post((object) ["start" => $week_start, "end" => $week_end, "row" => $element->post_row]);
    
                        $receptacle .= "
                        ". (isset($element->title)? ($element->title != "")? "<div class='element-title' id='element-popular-post-title'>". $element->title ."</div>" : "" : "") ."
                        <div class='element-body' id='element-popular-post'>
                            <ul class='popular-post-group'>";
                        if($get_article->num_rows() == 0){
                            $receptacle .= "<li class='popular-post-item'>Tidak Ada Postingan Popular Minggu Ini</li>";
                        } else {
                            foreach($get_article->result() as $ga){
                                if($element->post_thumbnail == "1"){
                                    $pp_thumb   = "<div class='popular-post-thumb'>
                                            <img src='". base_url("files/images/thumbnails/". $ga->article_thumbnail) ."' width='100%'>
                                        </div>";
                                } else {
                                    $pp_thumb   = "";
                                }
    
                                if($element->post_snippet == "1"){
                                    $pp_snippet   = "<span class='popular-post-snippet'>". mb_strimwidth(strip_tags($ga->article_content), 0, 50, "...") ."</span>";
                                } else {
                                    $pp_snippet   = "";
                                }
    
                                $receptacle .= "
                                <li class='popular-post-item'>
                                    <a href='". base_url($ga->article_permalink) ."' title='". $ga->article_title ."'>
                                        ". $pp_thumb ."
                                        <div class='popular-post-body'>
                                            <span class='popular-post-title'>". $ga->article_title ."</span>
                                            ". $pp_snippet ."
                                        </div>
                                    </a>
                                </li>";
                            }
                        }
                        $receptacle .= "
                            </ul>
                        </div>";
                        break;
                    case "7" : 
                        $visitor_today      = $CI->visitor->visitor_count(date("Y-m-d"))->num_rows();
                        $visitor_yesterday  = $CI->visitor->visitor_count(date("Y-m-d", strtotime("-1 day")))->num_rows();
                        $visitor_this_month = $CI->visitor->visitor_count(date("Y-m"))->num_rows();
                        $visitor_last_month = $CI->visitor->visitor_count(date("Y-m", strtotime("-1 month")))->num_rows();
                        $visitor_this_year  = $CI->visitor->visitor_count(date("Y"))->num_rows();
                        $visitor_last_year  = $CI->visitor->visitor_count(date("Y", strtotime("-1 year")))->num_rows();
                        $visitor_total      = $CI->visitor->visitor_count()->num_rows();
    
                        $receptacle .= "<style>
                            .table-visitor {width:100%;margin:auto;border-collapse:collapse}
                            .table-visitor tr {border-bottom:1px solid #ddd;vertical-align:center}
                            .table-visitor tr:last-child {border-bottom:none !important;vertical-align:center}
                        </style>
                        
                        <div class='element-title' id='element-visitor-title'>Statistik Pengunjung</div>
                            <div class='element-body' id='element-visitor'>
                                <table class='table-visitor'>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Hari Ini</td>
                                        <td style='width:50%'>". number_format($visitor_today, 0, ',', '.') ."</td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Kemarin</td>
                                        <td style='width:50%'>". number_format($visitor_yesterday, 0, ',', '.') ."</td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Bulan Ini</td>
                                        <td style='width:50%'>". number_format($visitor_this_month, 0, ',', '.') ."</td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Bulan Lalu</td>
                                        <td style='width:50%'>". number_format($visitor_last_month, 0, ',', '.') ."</td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Tahun Ini</td>
                                        <td style='width:50%'>
                                            ". numshort($visitor_this_year) ."
                                            ". ($visitor_this_year > 1000 ? "<small style='font-size:10px !important;color:#6c757d !important'>(". number_format($visitor_this_year, 0, ',', '.') .")</small>" : "") ."
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Tahun Lalu</td>
                                        <td style='width:50%'>
                                            ". numshort($visitor_last_year) ."
                                            ". ($visitor_last_year > 1000 ? "<small style='font-size:10px !important;color:#6c757d !important'>(". number_format($visitor_last_year, 0, ',', '.') .")</small>" : "") ."
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width:50%;font-weight:bold'>Total</td>
                                        <td style='width:50%'>
                                            ". numshort($visitor_total) ."
                                            ". ($visitor_total > 1000 ? "<small style='font-size:10px !important;color:#6c757d !important'>(". number_format($visitor_total, 0, ',', '.') .")</small>" : "") ."
                                        </td>
                                </table>
                            </div>
                        </div>";
                        break;
                    default : $receptacle .= "<script>error.log('undifined element')</script>"; break;
                }
            }
    
            return $receptacle;
        }
    
        function setdata($cookie_name, $cookie_value, $cookie_time = 86400){
            return setcookie($cookie_name, $cookie_value, time()+$cookie_time, "/");
        }
    
        function unsetdata($cookie_name){
            return setcookie($cookie_name, "", time()-3600, "/");
        }
    
        function count_visitor_index($page_id){
            $CI =& get_instance();
    
            $CI->load->model([
                "M_visitor" => "visitor"
            ]);
    
            return $CI->visitor->visitor_bypage($page_id)->num_rows();
    
        }
    
        function convert_month($month){
            switch($month){
                case "01" : 
                    return "Januari";
                    break;
                case "02" : 
                    return "Februari";
                    break;
                case "03" : 
                    return "Maret";
                    break;
                case "04" : 
                    return "April";
                    break;
                case "05" : 
                    return "Mei";
                    break;
                case "06" : 
                    return "Juni";
                    break;
                case "07" : 
                    return "Juli";
                    break;
                case "08" : 
                    return "Agustus";
                    break;
                case "09" : 
                    return "September";
                    break;
                case "10" : 
                    return "Oktober";
                    break;
                case "11" : 
                    return "November";
                    break;
                case "12" : 
                    return "Desember";
                    break;
                default : 
                    return "Undefined";
                    break;
            }
        }
    
        function http_delivery_handler($status, $msg){
            switch($status){
                case "registered" : 
                    $code       = "registered";
                    $message    = "";
                    break;
                case "unregistered" : 
                    $code       = "unregistered";
                    $message    = $msg;
                    break;
                case "invalid_referrer" : 
                    $code       = "invalid_referrer";
                    $message    = $msg;
                    break;
                case "success" : 
                    $code       = "success";
                    $message    = $msg;
                    break;
                case "error" : 
                    $code       = "error";
                    $message    = $msg;
                    break;
                default : 
                    $code       = "default";
                    $message    = "";
                    break;
            }
    
            return (object) ["code" => $code, "message" => $message];
        }
    
        function http_delivery($type, $option, $data_post = ""){
            $CI =& get_instance();
    
            switch($type){
                case "GET" : 
                    $conn           = curl_init();
                    curl_setopt($conn, CURLOPT_URL, $option->url_destination . $option->url_path . $option->parameter);
                    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($conn, CURLOPT_REFERER, base_url());
                    $result         = curl_exec($conn);
    
                    $data           = json_decode($result);
                    $data_status    = http_delivery_handler($data->status, $data->message);
                    $error_check    = ["unregistered", "invalid_referrer", "error"];
                    $done_check     = ["registered", "default"];
    
                    if($result === false){
                        $status     = false;
                        $message    = curl_error($conn);
                    } else {
                        if(in_array($data_status->code, $error_check)){
                            $status     = false;
                            $message    = "<p><b>[". $data_status->code ."]</b></p>". $data_status->message;
                        } else {
                            if(in_array($data_status->code, $done_check)){
                                $status     = true;
                                $message    = "";
                            } else {
                                $status     = true;
                                $message    = $data_status->message;
                            }
                        }
                    }
    
                    curl_close($conn);
                    break;
                case "POST" : 
                    $conn           = curl_init();
                    curl_setopt($conn, CURLOPT_URL, $option->url_destination . $option->url_path . $option->parameter);
                    curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($conn, CURLOPT_POSTFIELDS, $data_post);
                    curl_setopt($conn, CURLOPT_REFERER, base_url());
                    $result         = curl_exec($conn);
    
                    $data           = json_decode($result);
                    $data_status    = http_delivery_handler($data->status, $data->message);
                    $error_check    = ["unregistered", "invalid_referrer", "error"];
                    $done_check     = ["registered", "default"];
    
                    if($result === false){
                        $status     = false;
                        $message    = curl_error($conn);
                    } else {
                        if(in_array($data_status->code, $error_check)){
                            $status     = false;
                            $message    = "<p><b>[". $data_status->code ."]</b></p>". $data_status->message;
                        } else {
                            if(in_array($data_status->code, $done_check)){
                                $status     = true;
                                $message    = "";
                            } else {
                                $status     = true;
                                $message    = $data_status->message;
                            }
                        }
                    }
    
                    curl_close($conn);
                    break;
                default :
                    $status     = false;
                    $message    = "Invalid method HTTP Delivery";
                    $data       = "";
                    break;
            }
    
            $output = (object) [
                "status"    => $status,
                "message"   => $message,
                "data"      => $data,
            ];
    
            return $output;
        }

    }