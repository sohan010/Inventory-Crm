<?php
namespace App\Helpers;

    class FlashMsg{

        public static function item_cloned($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Item Cloned Successfully')
            ];
        }
        public static function item_new($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Item Added Successfully')
            ];
        }
        public static function item_update($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Item Updated Successfully')
            ];
        }
        public static function item_delete($msg = null){
            return [
                'type' => 'danger',
                'msg' => $msg ?? __('Item Deleted Successfully')
            ];
        }
        public static function item_clone($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Item Cloned Successfully')
            ];
        }
        public static function settings_update($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Settings Updated Successfully')
            ];
        }
        public static function settings_new($msg = null){
            return [
                'type' => 'success',
                'msg' => $msg ?? __('Settings Added Successfully')
            ];
        }
        public static function settings_delete($msg = null){
            return [
                'type' => 'danger',
                'msg' => $msg ?? __('Settings Deleted Successfully')
            ];
        }
    }
?>
