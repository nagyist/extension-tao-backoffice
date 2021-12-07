<?php

/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2021 (original work) Open Assessment Technologies SA;
 */

declare(strict_types=1);

namespace oat\taoBackOffice\model\lists;

use core_kernel_classes_Class;
use oat\tao\model\TaoOntology;
use oat\generis\model\data\Ontology;
use tao_models_classes_LanguageService;
use oat\tao\model\Specification\ClassSpecificationInterface;

class EditableListClassSpecification implements ClassSpecificationInterface
{
    /** @var Ontology */
    private $ontology;

    public function __construct(Ontology $ontology)
    {
        $this->ontology = $ontology;
    }

    public function isSatisfiedBy(core_kernel_classes_Class $class): bool
    {
        return $class->isSubClassOf($this->ontology->getClass(TaoOntology::CLASS_URI_LIST))
            && $class->getUri() !== tao_models_classes_LanguageService::CLASS_URI_LANGUAGES;
    }
}
