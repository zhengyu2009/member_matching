<?php
$this->Html->addCrumb('ホーム', '/member_matching');
$this->Html->addCrumb('ユーザー', '/users');
addCrumb('カテゴリー一覧', array('controller'=>'categories','action'=>'index'));
$this->Html->addCrumb('ユーザーの追加', array('controller' => 'users', 'action' => 'add'));
$this->Html->addCrumb('ユーザーの編集', array('controller' => 'users', 'action' => 'edit'));
$this->Html->addCrumb('マイページ', array('controller' => 'users', 'action' => 'view'));
$this->Html->addCrumb('プロジェクト', '/projects');
$this->Html->addCrumb('プロジェクトの追加', array('controller' => 'projects', 'action' => 'add'));
$this->Html->addCrumb('プロジェクトの編集', array('controller' => 'projects', 'action' => 'edit'));
$this->Html->addCrumb('プロジェクトの詳細情報', array('controller' => 'projects', 'action' => 'view'));
?>
