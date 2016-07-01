<?php

namespace App\Http\Controllers;

use ParsedownExtra;

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
    public function getMarkdownDoc($md){

        if($md === 'index') {
            abort(404);
        }

        $ParsedownExtra = new ParsedownExtra();
        $docsDir = base_path('docs');
        $index_file = $docsDir.'/index.md';  //get markdown index file : index.md (default)

        if(is_file($index_file)) {
            $markdown = file_get_contents($index_file);
            $markdown_index = $ParsedownExtra->text($markdown);
        }
        else{
            $markdown_index = '<!--no docs index-->';
        }

        $file = $docsDir.'/'.$md.'.md';
        if(is_file($file)){
            $markdown = file_get_contents($file);
            $title = $md;
            $body = $ParsedownExtra->text($markdown);
            $md_doc_nav = '<div class="sider">'.$markdown_index.'</div>';
            return view('vendor.mdoc.doc', ['md_doc_title' => $title, 'md_doc_body' => $body, 'md_doc_nav' => $md_doc_nav]);
        } else{
            abort(404);
        }

    }

}
