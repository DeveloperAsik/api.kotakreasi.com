<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Description of MY_Model
 *
 * @author I00396.ARIF
 */
class AppTable extends Model {

    //put your code here
    use HasFactory;

    public function __scopeIsActive($request) {
        $request->where('is_active', 1);
    }

    public function __scopeIsNotActive($request) {
        $request->where('is_active', 0);
    }

    protected function __debug_model($params, $data) {
        if (isset($params['debug']['dd']) && $params['debug']['dd'] == 1 || isset($params['debug']['is_to_sql']) && $params['debug']['is_to_sql'] == 1) {
            dd($data);
        }
    }

    //-----------------------------------------------------------------------------//
    //$params = [
    //    'table_name' => 'tbl_a_groups',
    //    'select' => ['a.id', 'a.name', 'b.id AS parent_id', 'b.name AS parent_name'],
    //    'from' => 'tbl_a_groups as a',
    //    'join' => [
    //        'leftJoin' => [
    //            ['tbl_a_groups as b', 'b.id', '=', 'a.parent_id']
    //        ]
    //    ],
    //    'conditions' => [
    //        'where' => [
    //            ['a.is_active', '=', 1]
    //        ]
    //    ],
    //    'order' => [
    //        ['a.id', 'asc'],
    //        ['a.name', 'desc']
    //    ],
    //    'limit' => 5,
    //    'offset' => 0,
    //    'query_param' => config('app.url') . $request->getRequestUri()
    //];
    //$res = $this->MY_Model->find($request, 'all', $params);
    //-----------------------------------------------------------------------------//

    public function __find($request, $type = 'all', $params = [], $connection = 'mysql', $test = null) {
        $data = array();
        $limit = isset($params['limit']) ? $params['limit'] : 100;
        $offset = isset($params['offset']) ? $params['offset'] : 0;
        if (isset($params['table_name']) && !empty($params['table_name'])) {
            $table_name = $params['table_name'] . ' AS a';
        } else {
            $table = explode('\\', strtolower(get_class($this)));
            end($table);
            $key = key($table);
            $table_name = $table[$key] . ' AS a';
        }
        $sequence = DB::Connection($connection)->table($table_name);

        $total = 0;
        $select = '*';
        if (isset($params['select']) && !empty($params['select'])) {

            $arrSelect = [];
            foreach ($params['select'] AS $k => $v) {
                if (is_array($v)) {
                    $arrSelect[] = DB::raw($v['raw']);
                } else {
                    $arrSelect[] = $v;
                }
            }
            //if ($test == true) {
            //    dd($arrSelect);
            //}
            //$params['select'] = str_replace('raw', 'DB::raw',);
            $select = $arrSelect; //$params['select'];
        }
        if ($type == "list") {
            $select = ['a.id', 'a.name'];
        }
        if (isset($params['join']) && !empty($params['join'])) {
            foreach ($params['join'] AS $key => $val) {
                foreach ($val AS $k => $v) {
                    $sequence->{$key}($v[0], $v[1], $v[2], $v[3]);
                }
            }
        }
//        if ($test == true) {
//            dd($select);
//        }
        $orWhere = false;
        $arrOrWhere = [];

        if (isset($params['conditions']) && !empty($params['conditions'])) {
            foreach ($params['conditions'] AS $key => $val) {
                if ($key == 'where' || $key == 'orWhere') {
                    $arrOrWhere[] = [
                        'key' => $key,
                        'value' => $val
                    ];
                }
                switch ($key) {
                    case "whereBetween" :
                    case "whereNotBetween" :
                    case "whereIn" :
                    case "whereNotIn" :
                        foreach ($val AS $k => $v) {
                            $sequence->{$key}($v[0], $v[1]);
                        }
                        break;
                    case "whereNull" :
                    case "whereNotNull" :
                        $sequence->{$key}($val);
                        break;
                    case "whereAndOr":
                        if (isset($val) && !empty($val)) {
                            $sequence->where(function ($query) use ($params, $val) {
                                foreach ($val AS $k => $v) {
                                    switch ($k) {
                                        case "and" :
                                            if ($v) {
                                                foreach ($v AS $l => $w) {
                                                    $query->where($w);
                                                }
                                            }
                                            break;
                                        case "or":
                                            foreach ($v AS $l => $y) {
                                                $query->orWhere($y);
                                            }
                                            break;
                                    }
                                }
                            });
                            //self::__AppTable($params, $sequence);
                        }
                        break;
                }
            }
        }
        #self::__AppTable($params, $data);
        if ($arrOrWhere && count($arrOrWhere) > 1) {
            foreach ($arrOrWhere AS $key => $value) {
                if ($value['key'] == 'where') {
                    $sequence->where($value['value'][0][0], $value['value'][0][1], $value['value'][0][2]);
                }
                if ($value['key'] == 'orWhere') {
                    $sequence->where(function ($query) use ($value) {
                        foreach ($value['value'] AS $k => $v) {
                            $query->orWhere($v[0], $v[1], $v[2]);
                        }
                    });
                }
            }
        } else {
            foreach ($arrOrWhere AS $key => $value) {
                if ($value['key'] == 'where') {
                    foreach ($value['value'] AS $l => $w) {
                        $sequence->where($w[0], $w[1], $w[2]);
                    }
                }
                if ($value['key'] == 'orWhere') {
                    foreach ($value['value'] AS $l => $w) {
                        $sequence->orWhere($w[0], $w[1], $w[2]);
                    }
                }
            }
        }
        if (isset($type) && !empty($type)) {
            switch ($type) {
                case "first":
                    $data = $sequence->select($select)->orderBy('a.id', 'asc')->first();
                    break;
                case "last";
                    $data = $sequence->select($select)->orderBy('a.id', 'desc')->first();
                    break;
                case "list":
                default:
                    if (isset($params['debug']) && !empty($params['debug'])) {
                        if (isset($params['debug']['is_params']) && !empty($params['debug']['is_params']) && $params['debug']['is_params'] == 1) {
                            dd($params['order']);
                        }
                    }
                    if (isset($params['order']) && !empty($params['order'])) {
                        foreach ($params['order'] AS $k => $v) {
                            $sequence->orderBy($v[0], $v[1]);
                        }
                    }
                    $total = ($sequence->count()) ? $sequence->count() : 0;

                    if (isset($params['group']) && !empty($params['group'])) {
                        $data = $sequence->select($select)->groupBy($params['group'])->distinct()->get();

                        $total = count($sequence->select($select)->get());
                    }
                    if (isset($params['debug']) && !empty($params['debug'])) {
                        if (isset($params['debug']['is_to_sql']) && !empty($params['debug']['is_to_sql']) && $params['debug']['is_to_sql'] == 1) {
                            $data = $sequence->select($select)->offset($offset)->limit($limit)->toSql();
                            //self::__AppTable($params, $data);
                        }
                    } else {
                        $all_total = $sequence->select($select)->distinct()->get();
                        $total = count($all_total);
                        $data = $sequence->select($select)->offset($offset)->limit($limit)->distinct()->get();
                    }
                    //if ($test == true) {
                    //    dd($total);
                    //}
                    break;
            }
        }
        if ($test != null && $test == true) {
            //dd($table_name);
            //$r = $sequence->select($select)->offset($offset)->limit($limit)->distinct()->get();
            dd($data);
        }
        $meta = [
            'total' => $total,
            'offset' => $offset,
            'current_page' => $offset + 1,
            'limit' => $limit,
            'query_param' => isset($params['query_param']) ? $params['query_param'] : ''
        ];
        return [
            'meta' => $meta, 'data' => $data
        ];
    }

    public function __raw($request, $params = '', $connection = 'mysql') {
        if ($params != '') {
            return DB::Connection($connection)->table($params[0])->raw($params[1]);
        }
    }

    public function __count($request, $params = [], $connection = 'mysql') {
        if (isset($params['table_name']) && !empty($params['table_name'])) {
            $sequence = DB::Connection($connection)->table($params['table_name']);

            return $sequence->count();
        } else {
            return 0;
        }
    }

    public function __find_scheme($request, $table_name = '', $connection = 'mysql') {
        return DB::Connection($connection)->getSchemaBuilder()->getColumnListing($table_name);
    }

    public function __findOne($request, $params = [], $connection = 'mysql') {
        return self::find($request, 'first', $params, $connection);
    }

    public function __findFirst($request, $params = [], $connection = 'mysql') {
        return self::find($request, 'first', $params, $connection);
    }

    public function __findLast($request, $params = [], $connection = 'mysql') {
        return self::find($request, 'last', $params, $connection);
    }

    public function __findList($request, $params = [], $connection = 'mysql') {
        return self::find($request, 'list', $params, $connection);
    }

    public function __insert($request, $params = [], $connection = 'mysql') {
        return DB::Connection($connection)->table($params['table_name'])->insert($params['data']);
    }

    public function __insert_get_id($request, $params = [], $connection = 'mysql') {
        return DB::Connection($connection)->table($params['table_name'])->insertGetId($params['data']);
    }

    public function __update($request, $data, $params = [], $connection = 'mysql') {
        if (!$data || empty($data)) {
            return null;
        }
        return DB::Connection($connection)->table($params['table_name'])->where($params['conditions']['keyword'], $params['conditions']['value'])->update($data);
    }

    public function __remove($id = null, $data = [], $params = [], $connection = 'mysql') {
        if (!$data || empty($data)) {
            return null;
        }
        return DB::Connection($connection)->table($params['table_name'])->where('id', '=', $id)->update($data);
    }

    public function __delete($request, $params = [], $connection = 'mysql') {
        if (!$params || empty($params) || $params == null) {
            return null;
        }
        return DB::Connection($connection)->table($params['table_name'])->where($params['conditions']['keyword'], '=', $params['conditions']['value'])->delete();
    }
}
