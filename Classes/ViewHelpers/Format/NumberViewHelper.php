<?php

namespace WEBcoast\Recipes\ViewHelpers\Format;

use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class NumberViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();

        $this->registerArgument('value', 'float|int', 'The number value to be formatted', false, null);
        $this->registerArgument('style', 'string|int', 'The style constant name or its integer value', false, \NumberFormatter::DECIMAL);
        $this->registerArgument('minDecimals', 'int', 'Minimum number of decimal digits', false, 0);
        $this->registerArgument('maxDecimals', 'int', 'Maximum number of decimal digits', false, 2);
        $this->registerArgument('roundingMode', 'string|int', 'The rounding mode constant or its integer value', false, \NumberFormatter::ROUND_HALFUP);
    }

    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $value = $arguments['value'];
        if ($value === null) {
            $value = $renderChildrenClosure();
        }
        $style = $arguments['style'];
        if (!MathUtility::canBeInterpretedAsInteger($style)) {
            $style = constant(\NumberFormatter::class . '::' . $style);
        }
        $numberFormatter = new \NumberFormatter('de_DE', (int)$style);
        $numberFormatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, $arguments['minDecimals']);
        $numberFormatter->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, $arguments['maxDecimals']);
        $roundingMode = $arguments['roundingMode'];
        if (!MathUtility::canBeInterpretedAsInteger($roundingMode)) {
            $roundingMode = constant(\NumberFormatter::class . '::ROUND_' . str_replace('ROUND_', '', $roundingMode));
        }
        $numberFormatter->setAttribute(\NumberFormatter::ROUNDING_MODE, $roundingMode);

        return $numberFormatter->format($value);
    }

}
