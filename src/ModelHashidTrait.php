<?php 

namespace HskyZhou\RepositoryHashid;

use Hashids;

Trait ModelHashidTrait
{
	public function getEncryptConnection(){
		return 'main';
	}

	/**
	 * 加密id
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-12 10:47:11
	 * @return		
	 */
	public function encodeId($value){
		if(checkEncrypt($this->getEncryptConnection())){
			return Hashids::connection($this->getEncryptConnection())->encode($value);
		}else{
			return $value;
		}
	}

	/**
	 * 解密id
	 * @param  [type] $connection [description]
	 * @param  [type] $value      [description]
	 * @return [type]             [description]
	 */
	public function decodeId($value){
		if(checkEncrypt($this->getEncryptConnection())){
			$arr = Hashids::connection($this->getEncryptConnection())->decode($value);
			return isset($arr[0]) && $arr[0] ? $arr[0] : 0;
		}else{
			return $value;
		}
	}
}