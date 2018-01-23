<?php

/**
 * @apiGroup           Note
 * @apiName            findNoteById
 *
 * @api                {GET} /v1/notes/:id Get Note
 * @apiDescription     Get only one specific note (if the current user has access to the linked entity)
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('notes/{id}', [
    'as' => 'api_note_find_note_by_id',
    'uses'  => 'Controller@findNoteById',
    'middleware' => [
      'auth:api',
    ],
]);
