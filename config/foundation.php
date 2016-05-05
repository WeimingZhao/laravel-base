<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/20
 * Time: 18:27
 */

return [

    /**
     *
     */
    'app_name' => 'RF后台管理系统',
//    'app_name' => '牛牛营养管理系统',

    'app_name_mini' => 'RFMS',
//    'app_name_mini' => '牛牛营养',

    /**
     * 系统超级用户id
     */
    'super_admin' => [1],

    /**
     * 系统超级角色id
     */
    'super_roles' => [1],

    'db_config' => [
        'types' => [
            ['id' => 1, 'name' => 'text', 'title' => '文本'],
            ['id' => 2, 'name' => 'textarea', 'title' => '长文本'],
            ['id' => 3, 'name' => 'integer', 'title' => '数字'],
            ['id' => 4, 'name' => 'boolean', 'title' => '布尔'],
            ['id' => 5, 'name' => 'image', 'title' => '图片'],
        ],
        'groups' => [
            ['id' => 1, 'title' => '系统配置', 'display' => 1],//title:标题,display,是否作为私有设置
            ['id' => 2, 'title' => '安全配置', 'display' => 1],
            ['id' => 3, 'title' => '显示配置', 'display' => 0],
        ],
    ],
    /**
     * fontawesome 图标 v4.5 部分图标
     * http://fontawesome.dashgame.com/
     */
    'fontawesome' => [
        'dashboard', 'home', 'plus', 'edit', 'remove', 'sort', 'power-off',
        'adjust', 'anchor', 'archive', 'area-chart', 'arrows', 'arrows-h',
        'arrows-v', 'asterisk', 'at', 'automobile', 'balance-scale', 'ban',
        'bank', 'bar-chart', 'barcode', 'bars', 'bed', 'beer', 'bell', 'bicycle',
        'binoculars', 'birthday-cake', 'bluetooth', 'bolt',
        'book', 'bomb', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn',
        'bullseye', 'calendar', 'camera', 'car', 'cart-plus', 'sitemap',
        'check', 'check-square-o', 'child', 'circle', 'circle-o', 'circle-o-notch',
        'clock-o', 'clone', 'cloud', 'cloud-download', 'cloud-upload', 'code', 'code-fork',
        'coffee', 'cog', 'cogs', 'comment', 'commenting', 'comments', 'comments-o',
        'compass', 'copyright', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs',
        'cube', 'cubes', 'database', 'desktop', 'dot-circle-o',
        'envelope', 'envelope-o', 'eraser', 'exchange', 'exclamation-circle',
        'external-link', 'eye', 'fax', 'feed', 'female', 'fighter-jet',
        'file-image-o', 'file-excel-o', 'film', 'fire', 'flag-o', 'folder',
        'gamepad', 'gavel', 'glass', 'globe', 'group', 'graduation-cap',
        'hashtag', 'heart', 'history', 'industry', 'key', 'leaf', 'life-ring',
        'line-chart', 'location-arrow', 'magic', 'lock', 'magnet', 'map',
        'share-alt', 'ship', 'shopping-cart', 'tag', 'tasks', 'ticket', 'user-plus',
        'users', 'user-times', 'user', 'wrench', 'android', 'apple', 'amazon',
    ],
];