<?php 

function backurl(){
	$url = url()->previous() != null ? url()->previous() : route('admin.backend.dashboard');
    return '<a href="'.$url.'" class="btn btn-primary float-right">Back</a>';
}