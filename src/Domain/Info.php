<?php
namespace PhalApi\Usercheck\Domain;
use PhalApi\Usercheck\Model\User as ModelUser;

/**
 * 用户领域类
 *
 * @author Aevit 
 */

class Info {

    public function getUserInfo($userId) {
        $rs = array();
        
        $userId = intval($userId);
        if ($userId <= 0) {
            return $rs;
        }

        $model = new ModelUser();
        $rs = $model->get($userId, 'id, username, nickname, avatar'); //按需获取

        if (empty($rs)) {
            return $rs;
        }

        $rs['user_id'] = intval($rs['id']);
        unset($rs['id']);

        return $rs;
    }
}
