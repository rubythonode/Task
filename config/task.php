<?php
 return ['task' => [
                    'Name'          => 'Task',
                    'name'          => 'task',
                    'table'         => 'tasks',
                    'model'         => 'Lavalite\Task\Models\Task',
                    'image'         => [
                        'xs'        => ['width' => '60',     'height' => '45'],
                        'sm'        => ['width' => '100',    'height' => '75'],
                        'md'        => ['width' => '460',    'height' => '345'],
                        'lg'        => ['width' => '800',    'height' => '600'],
                        'xl'        => ['width' => '1000',   'height' => '750'],
                        ],
                    'fillable'          => ['id', 'parent_id', 'user_id', 'start', 'end', 'category', 'task', 'time_required', 'time_taken', 'proprity', 'status', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'listfields'        => ['id', 'parent_id', 'user_id', 'start', 'end', 'category', 'task', 'time_required', 'time_taken', 'proprity', 'status', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'translatable'      => ['id', 'parent_id', 'user_id', 'start', 'end', 'category', 'task', 'time_required', 'time_taken', 'proprity', 'status', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'upload-folder'     => '/uploads/task/task',
                    'uploadable'        => [
                                                'single'   => [],
                                                'multiple' => [],
                                            ],

                    ]];
