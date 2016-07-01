<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeRequest;
use Illuminate\Http\Request;
use App\Repositories\SystemRepository;
use Douyasi\Cache\DataCache;
use Gate;

/**
 * 系统配置控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class OptionController extends BackController
{
    /**
     * The SystemRepository instance.
     *
     * @var App\Repositories\SystemRepository
     */
    protected $system;

    public function __construct(SystemRepository $system)
    {
        parent::__construct();
        $this->system = $system;
        if (Gate::denies('@option')) {
            $this->middleware('deny403');
        }
    }

    public function getOption()
    {
        //
        $system_options = $this->system->getAllOptions();
        foreach ($system_options as $so) {
            $data[$so['name']] = $so['value'];
        }

        return view('admin.back.option.index', compact('data'));
    }


    public function putOption(Request $request)
    {
        if (Gate::denies('option-write')) {
            return deny();
        }
        $data = $request->input('data');
        if ($data && is_array($data)) {
            $this->system->updateOptions($data);
            //更新系统静态缓存
            DataCache::cacheStatic();
            return redirect()->back()->with('message', '成功更新系统配置！');
        } else {
            return redirect()->back()->with('fail', '提交过来的数据异常！');
        }
    }
}
