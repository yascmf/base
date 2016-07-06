<?php

namespace Douyasi\Documentation;

use ParsedownExtra;

/**
 * Markdown（转HTML）文档解析类
 */
class MarkdownDocumentation
{

    public function parseMarkdownFile($md, $docs_dir = 'docs')
    {
        if($md === 'index') {
            return abort(404);
        }

        $ParsedownExtra = new ParsedownExtra();
        $docsDir = base_path($docs_dir);
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
        } else {
            return abort(404);
        }
    }
}
