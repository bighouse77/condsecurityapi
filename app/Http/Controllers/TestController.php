<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     summary="Exemplo de rota documentada",
     *     tags={"Exemplo"},
     *     @OA\Response(
     *         response=200,
     *         description="Retorno de sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Exemplo funcionando!")
     *         )
     *     )
     * )
     */
    public function test()
    {
        return response()->json(['message' => 'Exemplo funcionando!']);
    }
}
