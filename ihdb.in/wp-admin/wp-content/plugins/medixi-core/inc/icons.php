<?php

// Flat icons
function medilax_flaticons() {
    return [
        'flaticon-blood-pressure'   	=> esc_html__('Blood Pressure', 'medilax'),
        'flaticon-computer-mouse'   	=> esc_html__('Computer Mouse', 'medilax'),
        'flaticon-discuss'   			=> esc_html__('Discuss', 'medilax'),
        'flaticon-ecg'   				=> esc_html__('ECG', 'medilax'),
        'flaticon-electrocardiogram'   	=> esc_html__('Electrocardiogram', 'medilax'),
        'flaticon-group'   				=> esc_html__('Group', 'medilax'),
        'flaticon-healthcare'   		=> esc_html__('Healthcare', 'medilax'),
        'flaticon-injection'   			=> esc_html__('Injection', 'medilax'),
        'flaticon-laboratory-equipment' => esc_html__('Laboratory Equipment', 'medilax'),
        'flaticon-medical-kit'   		=> esc_html__('Medical kit', 'medilax'),
        'flaticon-medical-mask'   		=> esc_html__('Medical Mask', 'medilax'),
        'flaticon-medical-results'   	=> esc_html__('Medical Results', 'medilax'),
        'flaticon-medical-symbol'   	=> esc_html__('Medical Symbol', 'medilax'),
        'flaticon-quality-of-life'   	=> esc_html__('Medical Quality of life', 'medilax'),
        'flaticon-quotation'   			=> esc_html__('Quotation', 'medilax'),
        'flaticon-quote'   				=> esc_html__('Quote', 'medilax'),
        'flaticon-security'   			=> esc_html__('Security', 'medilax'),
        'flaticon-stethoscope-1'   		=> esc_html__('Stethoscope', 'medilax'),
        'flaticon-stethoscope'   		=> esc_html__('Stethoscope 2', 'medilax'),
    ];
}

function medilax_include_flaticons() {
    return array_keys(medilax_flaticons());
}