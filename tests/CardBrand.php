<?php

namespace Crosspay\Test;

class CardBrand extends Enum
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
