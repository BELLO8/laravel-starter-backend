<?php

namespace App\Http\HttpStatusCodes;

//NB: Traits est un groupe de méthodes qui peuvent être réutiliser dans une autre classe.
trait StatusCodes
{
    // array return http status codes with text
    public static $HttpCodes = [
        'OK' => [
            'code' => 200,
            'message' => 'Operation effectuée avec succès',
        ],
        'CREATED' => [
            'code' => 201,
            'message' => 'Ressource créée avec succès',
        ],
        'ACCEPTED' => [
            'code' => 202,
            'message' => 'Requête acceptée',
        ],
        'NO_CONTENT' => [
            'code' => 204,
            'message' => 'Pas de contenu',
        ],
        'MOVED_PERMANENTLY' => [
            'code' => 301,
            'message' => 'Déplacé de façon permanente',
        ],
        'FOUND' => [
            'code' => 302,
            'message' => 'Déplacé temporairement',
        ],
        'SEE_OTHER' => [
            'code' => 303,
            'message' => 'Voir autre',
        ],
        'NOT_MODIFIED' => [
            'code' => 304,
            'message' => 'Non modifié',
        ],
        'TEMPORARY_REDIRECT' => [
            'code' => 307,
            'message' => 'Redirection temporaire',
        ],
        'PERMANENT_REDIRECT' => [
            'code' => 308,
            'message' => 'Redirection permanente',
        ],
        'BAD_REQUEST' => [
            'code' => 400,
            'message' => 'Requête incorrecte',
        ],
        'UNAUTHORIZED' => [
            'code' => 401,
            'message' => 'Non autorisé',
        ],
        'FORBIDDEN' => [
            'code' => 403,
            'message' => 'Interdit',
        ],
        'NOT_FOUND' => [
            'code' => 404,
            'message' => 'Non trouvé',
        ],
        'METHOD_NOT_ALLOWED' => [
            'code' => 405,
            'message' => 'Méthode non autorisée',
        ],
        'NOT_ACCEPTABLE' => [
            'code' => 406,
            'message' => 'Non acceptable',
        ],
        'REQUEST_TIMEOUT' => [
            'code' => 408,
            'message' => 'Délai de requête dépassé',
        ],
        'CONFLICT' => [
            'code' => 409,
            'message' => 'Conflit',
        ],
        'GONE' => [
            'code' => 410,
            'message' => 'Gone',
        ],
        'LENGTH_REQUIRED' => [
            'code' => 411,
            'message' => 'Longueur requise',
        ],
        'PRECONDITION_FAILED' => [
            'code' => 412,
            'message' => 'Précondition échouée',
        ],
        'PAYLOAD_TOO_LARGE' => [
            'code' => 413,
            'message' => 'Payload trop volumineux',
        ],
        'UNSUPPORTED_MEDIA_TYPE' => [
            'code' => 415,
            'message' => 'Type de média non supporté',
        ],
        'UNPROCESSABLE_ENTITY' => [
            'code' => 422,
            'message' => 'Entité non traitable',
        ],
        'TOO_MANY_REQUESTS' => [
            'code' => 429,
            'message' => 'Trop de requêtes',
        ],
        'INTERNAL_SERVER_ERROR' => [
            'code' => 500,
            'message' => 'Erreur interne du serveur',
        ],
        'NOT_IMPLEMENTED' => [
            'code' => 501,
            'message' => 'Non implémenté',
        ],
        'BAD_GATEWAY' => [
            'code' => 502,
            'message' => 'Mauvaise passerelle',
        ],
        'SERVICE_UNAVAILABLE' => [
            'code' => 503,
            'message' => 'Service indisponible',
        ],
        'GATEWAY_TIMEOUT' => [
            'code' => 504,
            'message' => 'Délai de la passerelle dépassé',
        ],
        'HTTP_VERSION_NOT_SUPPORTED' => [
            'code' => 505,
            'message' => 'Version HTTP non prise en charge',
        ],

        'INVALID_TOKEN' => [
            'code' => 1001,
            'message' => 'Le Token est invalide',
        ],
        'INVALID_CREDENTIALS' => [
            'code' => 1002,
            'message' => 'Les informations de connexion sont incorrectes',
        ],
    ];
}
