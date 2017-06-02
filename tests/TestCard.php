<?php

namespace Crosspay\Test;

trait TestCard
{

    public function normalCardNumber(CardBrand $brand)
    {
        $number = '';
        switch ($brand) {
            case CardBrand::Visa:
                $number = '4242424242424242';
                break;
            case CardBrand::VisaDebit:
                $number = '4000056655665556';
                break;
            case CardBrand::Mastercard:
                $number = '5555555555554444';
                break;
            case CardBrand::MastercardDebit:
                $number = '5200828282828210';
                break;
            case CardBrand::MastercardPrepaid:
                $number = '5105105105105100';
                break;
            case CardBrand::AmericanExpress:
                $number = '378282246310005';
                break;
            case CardBrand::Discover:
                $number = '6011111111111117';
                break;
            case CardBrand::DinersClub:
                $number = '30569309025904';
                break;
            case CardBrand::JCB:
                $number = '3530111333300000';
                break;
        }
        return $number;
    }

    public function normalCardStripeToken(CardBrand $brand)
    {
        $token = '';
        switch ($brand) {
            case CardBrand::Visa:
                $token = 'tok_visa';
                break;
            case CardBrand::VisaDebit:
                $token = 'tok_visa_debit';
                break;
            case CardBrand::Mastercard:
                $token = 'tok_mastercard';
                break;
            case CardBrand::MastercardDebit:
                $token = 'tok_mastercard_debit';
                break;
            case CardBrand::MastercardPrepaid:
                $token = 'tok_mastercard_prepaid';
                break;
            case CardBrand::AmericanExpress:
                $token = 'tok_amex';
                break;
            case CardBrand::Discover:
                $token = 'tok_discover';
                break;
            case CardBrand::DinersClub:
                $token = 'tok_diners';
                break;
            case CardBrand::JCB:
                $token = 'tok_jcb';
                break;
        }
        return $token;
    }

}
