<?php 

namespace HskyZhou\RepositoryHashid;

use Hashids;

Trait RepositoryHashidTrait
{
	/**
	 * 设置 加密 链接
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-12 10:47:00
	 * @return		
	 */
	public function setEncryptConnection($connection = 'main'){
		$this->HashidsConnection = $connection;
	}

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
	public function encodeId($id){
		if(checkEncrypt($this->getEncryptConnection())){
			return Hashids::connection($this->getEncryptConnection())->encode($id);
		}else{
			return $id;
		}
	}

	/**
	 * 解密id
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-12 10:47:16
	 * @return		
	 */
	public function decodeId($id){
		if(checkEncrypt($this->getEncryptConnection())){
			$ids = Hashids::connection($this->getEncryptConnection())->decode($id);
			if(isset($ids[0])){
				return $ids[0];
			}else{
				throw new \Exception("解密失败");
			}
		}else{
			return $id;
		}
	}

	/**
	 * 解密数组id
	 * @param  [type] $ids [description]
	 * @return [type]      [description]
	 */
	public function decodeArrId($ids) {
		$results = [];
		if ($ids) {
			foreach ($ids as $id) {
				$results[] = $this->decodeId($id);
			}
		}

		return $results;
	}
}