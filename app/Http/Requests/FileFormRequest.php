<?php
/**
 * Created by PhpStorm.
 * User: Sampaio
 * Date: 10/11/2016
 * Time: 20:42
 */

namespace app\Http\Requests;

use App\Http\Requests\Request;
class FileFormRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file'       => 'required'
        ];
    }

}