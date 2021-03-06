<?php
/**
 * Copyright 2010-2014 baas-platform.com, Pty Ltd. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Apache\Usergrid\Api\Models;


use Guzzle\Service\Command\ResponseClassInterface;

/**
 * Class Role
 *
 * @package    Apache/Usergrid
 * @version    1.0.0
 * @author     Jason Kristian <jasonkristian@gmail.com>
 * @license    Apache License, Version  2.0
 * @copyright  (c) 2008-2014, Baas Platform Pty. Ltd
 * @link       http://baas-platform.com
 */
class Role extends BaseCollection implements ResponseClassInterface
{

    use GuzzleCommandTrait;

    public function usersAttribute()
    {
        return $this->getApiClient()->application()->GetRelationship([
            'collection' => 'roles',
            'entity_id' => $this->entities->fetch('uuid')->first(),
            'relationship' => 'users'
        ])->toArray();
    }

    public function groupsAttribute()
    {
        return $this->getApiClient()->application()->GetRelationship([
            'collection' => 'roles',
            'entity_id' => $this->entities->fetch('uuid')->first(),
            'relationship' => 'groups'
        ])->toArray();
    }
}