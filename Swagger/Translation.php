<?php

/**
 * @OA\Get(
 *     path="/translations",
 *     tags={"Translation"},
 *     summary="Returns all translations",
 *     description="Returns all translations in project",
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *     ),
 *     security={
 *         {"passport": {}}
 *     }
 * )
 */


/**
 * @OA\Get(
 *     path="/translations/{group}/{key}",
 *     tags={"Translation"},
 *     summary="Returns a translations",
 *     description="Returns a translations in project",
 *     @OA\Parameter(
 *          name="group",
 *          description="Group",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string",
 *              format="name"
 *          )
 *      ),
 *     @OA\Parameter(
 *          name="key",
 *          description="Key",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string",
 *              format="name"
 *          )
 *      ),
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *     ),
 *     security={
 *         {"passport": {}}
 *     }
 * )
 */
