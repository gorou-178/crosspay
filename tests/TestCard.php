<?php

class CardBrand
{
    const Visa = 'Visa';
    const VisaDebit = 'Visa(debit)';
    const Mastercard = 'Mastercard';
    const MastercardDebit = 'Mastercard(debit)';
    const MastercardPrepaid = 'Mastercard(prepaid)';
    const AmericanExpress = 'American Express';
    const Discover = 'Discover';
    const DinersClub = 'Diners Club';
    const JCB = 'JCB';
}

trait TestCard
{

    public function normalCardToken(CardBrand $brand)
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

    /**
     * @return string
     */
    public function chargeCustomerFailToken()
    {
        return 'tok_chargeCustomerFail';
    }

}
