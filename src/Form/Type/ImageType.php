<?php

/*
 * This file is part of Monsieur Biz' Rich Editor plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin\Form\Type;

use MonsieurBiz\SyliusRichEditorPlugin\Uploader\FileUploader;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ImageType extends AbstractFileType
{
    /**
     * @inheritdoc
     */
    public function getBlockPrefix()
    {
        return 'monsieurbiz_rich_editor_plugin_image';
    }

    /**
     * @inheritdoc
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        parent::buildView($view, $form, $options);
        $view->vars['filterWidth'] = $options['filter-width'];
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'file-type' => FileUploader::FILE_TYPE_IMAGE,
            'filter-width' => 200,
        ]);
    }
}
