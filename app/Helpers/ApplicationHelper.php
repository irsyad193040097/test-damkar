<?php
namespace App\Helpers;
use App\Models\Page;
use App\Models\Visitor;
use App\Models\Setting;
use App\Models\Post;

class ApplicationHelper {

    public static function getMenu()
    {
        $menu = Page::where('parent_id', 0)->with('childs')->orderBy('order', 'ASC')->get();

        return $menu;
    }

    public static function getNWords($string, $n = 5, $withDots = true)
    {
        $excerpt = explode(' ', strip_tags($string), $n + 1);
        $wordCount = count($excerpt);
        if ($wordCount >= $n) {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt);
        if ($withDots && $wordCount >= $n) {
            $excerpt .= '...';
        }
        return $excerpt;
    }

    public static function getFormatTime($date)
    {
        return \Carbon\Carbon::parse($date)->isoFormat('dddd, DD MMMM YYYY HH:mm:ss');
    }

    public static function getTodayVisitors()
    {
        $todayVisitor = Visitor::whereDate('created_at', date('Y-m-d'))->count();

        return $todayVisitor;
    }

    public static function getThisMonthVisitors()
    {
        $todayVisitor = Visitor::whereMonth('created_at', date('m'))->count();

        return $todayVisitor;
    }

    public static function getTotalVisitors()
    {
        $totalVisitor = Visitor::all()->count();

        return $totalVisitor;
    }

    public static function getProfil()
    {
        $data = Page::where('parent_id', 111)->get();

        return $data;
    }

    public static function getInformasi()
    {
        $data = Page::where('parent_id', 68)->get();

        return $data;
    }

    public static function getSetting()
    {
        $data = Setting::find(1);

        return $data;
    }

    public static function otherPost()
    {
        $data = Post::take(8)
        ->where('is_published', 1)
        ->get();

        return $data;
    }
}