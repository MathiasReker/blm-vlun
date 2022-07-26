<?php
/**
 * This file is part of the blmvuln package.
 *
 * @author Mathias Reker
 * @copyright Mathias Reker
 * @license MIT License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PrestaShop\Module\BlmVuln\web\form;

use PrestaShop\Module\BlmVuln\web\util\View;

final class HelpForm extends AbstractForm
{
    /**
     * @return array{form: array{legend: array{title: mixed, icon: string}, input: array<int, array{type: string, label: string, html_content: string, col: int, name: string}>}}
     */
    public function getFields(): array
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->module->l('Help', $this->className),
                    'icon' => 'icon-question-circle',
                ],
                'input' => [
                    [
                        'type' => 'html',
                        'label' => '',
                        'html_content' => $this->helpMenu(),
                        'col' => 12,
                        'name' => '',
                    ],
                ],
            ],
        ];
    }

    private function helpMenu(): string
    {
        $buttons = [
            [$this->module->l('Need help?', $this->className), 'https://github.com/MathiasReker/blmvuln/issues/new'],
            [
                $this->module->l('Want to donate?', $this->className),
                'https://github.com/sponsors/MathiasReker?frequency=one-time&sponsor=MathiasReker',
            ],
            [$this->module->l('See all my modules', $this->className), 'https://addons.prestashop.com/221_shinetech'],
        ];

        $result = [];

        foreach ($buttons as $button) {
            $result[] = View::displayBtnLink($button[0], $button[1]);
        }

        return implode('', $result);
    }
}
