<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author memad
 */
interface Exam_interface {
    public function load_exam_page($page);
    public function move_next();
    public function move_previous();
    public function  getNumberOfQuestions();
    public function getPage();
}
