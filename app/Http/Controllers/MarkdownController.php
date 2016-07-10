<?php

namespace App\Http\Controllers;

use Douyasi\Documentation\MarkdownDocumentation;

/**
 * Class MarkdownController
 *
 * markdown 文档解析控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */

class MarkdownController extends Controller
{

    /**
     * 解析Markdown文档并生存响应页面
     * @param  string $md markdown文档
     * @return Response
     */
    public function getMarkdownDoc(MarkdownDocumentation $doc, $md) {

        return $doc->parseMarkdownFile($md, 'docs');

    }

}
