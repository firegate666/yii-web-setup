<?php

/**
 * ApplicationConfigBehavior is a behavior for the application.
 * It loads additional config paramenters that cannot be statically
 * written in config/main
 *
 * @link http://www.yiiframework.com/wiki/26/setting-and-maintaining-the-language-in-application-i18n/#c1941
 */
class ApplicationConfigBehavior extends CBehavior {

	/**
	 * Declares events and the event handler methods
	 * See yii documentation on behaviour
	 */
	public function events() {
		return array_merge(parent::events(), array(
			'onBeginRequest'=>'beginRequest',
		));
	}

	/**
	 * Load configuration that cannot be put in config/main
	 */
	public function beginRequest() {
		$language = $this->owner->request->getParam('language', null);

		if ($language) {
			$this->owner->language = $language;
			$this->owner->user->setState('applicationLanguage', $language);
		} else if ($this->owner->user->getState('applicationLanguage')) {
			$this->owner->language = $this->owner->user->getState('applicationLanguage');
		} else {
			$this->owner->language = Yii::app()->params['defaultLanguage'];
		}
	}
}
