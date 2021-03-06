<?php

namespace Nuwave\Lighthouse\Schema\Directives;

use Nuwave\Lighthouse\Support\Contracts\DefinedDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldManipulator;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;

class MorphManyDirective extends RelationDirective implements FieldResolver, FieldManipulator, DefinedDirective
{
    /**
     * SDL definition of the directive.
     *
     * @return string
     */
    public static function definition()
    {
        return /* @lang GraphQL */ <<<'SDL'
"""
Corresponds to [Eloquent's MorphMany-Relationship](https://laravel.com/docs/5.8/eloquent-relationships#one-to-one-polymorphic-relations).
"""
directive @morphMany(
  """
  Specify the relationship method name in the model class,
  if it is named different from the field in the schema.
  """
  relation: String

  """
  Apply scopes to the underlying query.
  """
  scopes: [String!]

  """
  ALlows to resolve the relation as a paginated list.
  Allowed values: paginator, connection.
  """
  type: String

  """
  Specify the default quantity of elements to be returned.
  Only applies when using pagination.
  """
  defaultCount: Int

  """
  Specify the maximum quantity of elements to be returned.
  Only applies when using pagination.
  """
  maxCount: Int

  """
  Specify a custom type that implements the Edge interface
  to extend edge object.
  Only applies when using Relay style "connection" pagination.
  """
  edgeType: String
) on FIELD_DEFINITION
SDL;
    }
}
