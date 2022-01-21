<?php

/**
 * @OA\Info(
 * version="1.0.0",
 * title="Savoy API Doc",
 * description="
 *      All Requests need Api_Key Authentication,
 *      User Pages, Checkouts and Order Request need Bearer Token Authentication",
 * @OA\Contact(
 *    email="emredemirel4196@gmail.com",
 *    name="Emre Demirel"
 *  )
 * )
 */

/**
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      name="api_key",
 *      securityScheme="api_key",
 *      in="query"
 * )
 */

/**
 * @OA\SecurityScheme(
 *      type="http",
 *      name="bearer_token",
 *      securityScheme="bearer_token",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 */


/**
 * @OA\Get(
 *     path="/api/api-info",
 *     summary="Api Responser",
 *     tags={"Getting Started"},
 *      @OA\Response(
 *          response=200,
 *          description="Status, Message and Data ",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="version", 
 *            type="string", 
 *            example="1.0.23", 
 *        ), 
 *        @OA\Property(
 *            property="time", 
 *            type="string", 
 *            example="2022-01-20 23:19:45", 
 *        ), 
 *        @OA\Property(
 *            property="time-zone", 
 *            type="string", 
 *            example="Europe/London", 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */




/**
 * @OA\Get(
 *     path="/api/sliders",
 *     summary="Home Sliders Get",
 *     tags={"Home"},
 *      @OA\Response(
 *          response=200,
 *          description="Slider Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="image", 
 *                type="string", 
 *                example="http://localhost/upload/mobilesliders/holder.png", 
 *            ), 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */

/**
 * @OA\Get(
 *     path="/api/home-products",
 *     summary="Home Featured Products Get",
 *     tags={"Home"},
 *      @OA\Response(
 *          response=200,
 *          description="Featured Products Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="featured", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Accusantium dolore.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-98754.44", 
 *                ), 
 *                @OA\Property(
 *                    property="stock", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="sale_price", 
 *                    type="string", 
 *                    example="74.83", 
 *                ), 
 *                @OA\Property(
 *                    property="unit_price", 
 *                    type="string", 
 *                    example="74.83", 
 *                ), 
 *                @OA\Property(
 *                    property="discount", 
 *                    type="string", 
 *                    example="0.00", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="best_seller", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Molestiae inventore ut.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-36089.1", 
 *                ), 
 *                @OA\Property(
 *                    property="stock", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="sale_price", 
 *                    type="string", 
 *                    example="28.18", 
 *                ), 
 *                @OA\Property(
 *                    property="unit_price", 
 *                    type="string", 
 *                    example="28.18", 
 *                ), 
 *                @OA\Property(
 *                    property="discount", 
 *                    type="string", 
 *                    example="0.00", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="new_arrival", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Ut nihil at.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-99280.4", 
 *                ), 
 *                @OA\Property(
 *                    property="stock", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="sale_price", 
 *                    type="string", 
 *                    example="29.19", 
 *                ), 
 *                @OA\Property(
 *                    property="unit_price", 
 *                    type="string", 
 *                    example="29.19", 
 *                ), 
 *                @OA\Property(
 *                    property="discount", 
 *                    type="string", 
 *                    example="0.00", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="special_offer", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Et dolore.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-36687.1", 
 *                ), 
 *                @OA\Property(
 *                    property="stock", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="sale_price", 
 *                    type="string", 
 *                    example="22.84", 
 *                ), 
 *                @OA\Property(
 *                    property="unit_price", 
 *                    type="string", 
 *                    example="22.84", 
 *                ), 
 *                @OA\Property(
 *                    property="discount", 
 *                    type="string", 
 *                    example="0.00", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */


/**
 * @OA\Get(
 *     path="/api/categories/{id}",
 *     summary="Categories Get",
 *     tags={"Shop"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="0 for main categories, Category ID for sub categories of selected category",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Categories Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="name", 
 *                type="string", 
 *                example="Voluptas possimus.", 
 *            ), 
 *            @OA\Property(
 *                property="parent_id", 
 *                format="nullable", 
 *                type="string", 
 *            ), 
 *            @OA\Property(
 *                property="image", 
 *                type="string", 
 *                example="/upload/category/holder.png", 
 *            ), 
 *            @OA\Property(
 *                property="product_count", 
 *                type="number", 
 *            ), 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */

/**
 * @OA\Get(
 *     path="/api/products",
 *     summary="Products Get",
 *     tags={"Shop"},
 *      @OA\Parameter(
 *          name="category_id",
 *          in="query",
 *          description="Filter by category_id | If you fill search_text, category_id will not work.",
 *          required=false,
 *          @OA\Schema(type="integer")
 *      ),
 *       @OA\Parameter(
 *          name="search_text",
 *          in="query",
 *          description="Filter by search_text",
 *          required=false,
 *          @OA\Schema(type="string")
 *      ),
 *      @OA\Parameter(
 *          name="min_cost",
 *          in="query",
 *          description="Filter by min_cost",
 *          required=false,
 *          @OA\Schema(type="double")
 *      ),
 *      @OA\Parameter(
 *          name="max_cost",
 *          in="query",
 *          description="Filter by max_cost",
 *          required=false,
 *          @OA\Schema(type="double")
 *      ),
 *      @OA\Parameter(
 *          name="order",
 *          in="query",
 *          description="Order by your selection",
 *          required=true,
 *          @OA\Schema(
 *              type="string",
 *              default="latest",
 *              enum= {"latest","cheapest","expensive"}
 *              )
 *          ),
 *          @OA\Parameter(
 *          name="offset",
 *          in="query",
 *          description="Limit is 20. You can change offset for pagination",
 *          required=true,
 *          @OA\Schema(type="integer", default="0",)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Products Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="name", 
 *                type="string", 
 *                example="Nulla voluptatum eaque.", 
 *            ), 
 *            @OA\Property(
 *                property="sku", 
 *                type="string", 
 *                example="sku-69838.03", 
 *            ), 
 *            @OA\Property(
 *                property="stock", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="sale_price", 
 *                type="string", 
 *                example="66.17", 
 *            ), 
 *            @OA\Property(
 *                property="unit_price", 
 *                type="string", 
 *                example="66.17", 
 *            ), 
 *            @OA\Property(
 *                property="discount", 
 *                type="string", 
 *                example="0.00", 
 *            ), 
 *            @OA\Property(
 *                property="pack", 
 *                type="string", 
 *                example="1x20kg", 
 *            ), 
 *            @OA\Property(
 *                property="image", 
 *                type="string", 
 *                example="http://localhost/upload/product/imageholderproduct.jpg", 
 *            ), 
 *        ), 
 *    ),         
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */


/**
 * @OA\Get(
 *     path="/api/products/{id}",
 *     summary="Product Detail Get",
 *     tags={"Shop"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Product ID ",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product Detail Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="id", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="name", 
 *            type="string", 
 *            example="Corrupti dolore aspernatur.", 
 *        ), 
 *        @OA\Property(
 *            property="sku", 
 *            type="string", 
 *            example="sku-25895.66", 
 *        ), 
 *        @OA\Property(
 *            property="stock", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="sale_price", 
 *            type="string", 
 *            example="53.37", 
 *        ), 
 *        @OA\Property(
 *            property="unit_price", 
 *            type="string", 
 *            example="53.37", 
 *        ), 
 *        @OA\Property(
 *            property="discount", 
 *            type="string", 
 *            example="0.00", 
 *        ), 
 *        @OA\Property(
 *            property="description", 
 *            type="string", 
 *            example="Ipsam facere dolorem tempore laboriosam nostrum molestiae non et quo earum aliquam voluptatem ratione ea occaecati quos quia qui sequi autem vitae rem nihil dolorum cumque excepturi voluptatibus est nulla dicta est rerum et harum autem est iure ut aut non soluta.", 
 *        ), 
 *        @OA\Property(
 *            property="pack", 
 *            type="string", 
 *            example="1x20kg", 
 *        ), 
 *        @OA\Property(
 *            property="images", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="details", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="key", 
 *                    type="string", 
 *                    example="Consequatur.", 
 *                ), 
 *                @OA\Property(
 *                    property="value", 
 *                    type="string", 
 *                    example="Illum.", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *      }
 * )
 */


/**
 * @OA\Get(
 *     path="/api/products/{id}/is-favorited",
 *     summary=" Has this product been favorited by the user? | Need Bearer Token Authentication",
 *     tags={"Shop"},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Product ID ",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product Detail Array Returned",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Not Favorited", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="is_favorited", 
 *            type="boolean",
 *            example=false 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 *          {"bearer_token": {}},
 * 
 *      }
 * )
 */




/**
 *  
 * @OA\Post(
 *     path="/api/cart-price",
 *     summary=" Cart Price Calculation",
 *     tags={"Cart"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Calculate Cart Price",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="items", 
 *                  type="array", 
 *                  @OA\Items(
 *                      type="object", 
 *                  @OA\Property(
 *                      property="id", 
 *                      type="number",
 *                      example=1 
 *                    ), 
 *                  @OA\Property(
 *                      property="quantity", 
 *                      type="number",
 *                      example=1  
 *                    ), 
 *                  ), 
 *              ),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Cart Price Calculated",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="prices", 
 *            type="object", 
 *            @OA\Property(
 *                property="cartFinalCost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="cartBeforeDiscount", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="earn_point", 
 *                type="number", 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="item_details", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Corrupti dolore aspernatur.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-25895.66", 
 *                ), 
 *                @OA\Property(
 *                    property="stock", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="sale_price", 
 *                    type="string", 
 *                    example="53.37", 
 *                ), 
 *                @OA\Property(
 *                    property="unit_price", 
 *                    type="string", 
 *                    example="53.37", 
 *                ), 
 *                @OA\Property(
 *                    property="discount", 
 *                    type="string", 
 *                    example="0.00", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 * )
 *      ),
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */


/** 
 * 
 * 
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary=" Login with Crediantals",
 *     tags={"Auth"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Credentials",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="email", 
 *                  type="string", 
 *                  example="emredemirel4196@gmail.com", 
 *              ), 
 *              @OA\Property(
 *                  property="password", 
 *                  type="string", 
 *                  example="12****12", 
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Login Successfull",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="token", 
 *            type="string", 
 *            example="5|FSASKhca14ySdXby7sGeLGWLjCFkExc9M1KwrUjc", 
 *        ), 
 *        @OA\Property(
 *            property="company_name", 
 *            type="string", 
 *            example="Mr. Grady Dooley DVM", 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Need Email Verification",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="status", 
 *                  type="boolean", 
 *              ), 
 *              @OA\Property(
 *                   property="message", 
 *                   type="string", 
 *                   example="Verification Error!", 
 *              ), 
 *              @OA\Property(
 *                  property="data", 
 *                  format="nullable", 
 *                  type="string",
 *                  example=null 
 *              ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */


/** 
 * @OA\Post(
 *     path="/api/auth/logout",
 *     summary=" Logout for Delete Tokens",
 *     tags={"Auth"},
 *      @OA\Response(
 *          response=200,
 *          description="Logout Successful",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Logout Successful", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string",
 *        example=null 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *          {"bearer_token": {}},
 * 
 *      }
 * )
 */


/** 
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary=" Register with Crediantals",
 *     tags={"Auth"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Schema helps reqired/or not and other descriptions.",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="email", 
 *        type="string", 
 *        example="emredemirel4196@gmail.com",
 *    ), 
 *    @OA\Property(
 *        property="password", 
 *        type="string", 
 *        example="EMREberke96", 
 *    ), 
 *    @OA\Property(
 *        property="password_confirmation", 
 *        type="string", 
 *        example="EMREberke96", 
 *    ), 
 *    @OA\Property(
 *        property="name", 
 *        type="string", 
 *        example="Emre", 
 *    ), 
 *    @OA\Property(
 *        property="surname", 
 *        type="string", 
 *        example="Demirel", 
 *    ), 
 *    @OA\Property(
 *        property="mobile", 
 *        type="string", 
 *        example="(+90) 5303 912696", 
 *    ), 
 *    @OA\Property(
 *        property="phone", 
 *        type="string", 
 *        example="(+90) 5303 912696",
 *        description="Nullable",   
 *    ), 
 *    @OA\Property(
 *        property="company_name", 
 *        type="string", 
 *        example="SavoyFoods", 
 *    ), 
 *    @OA\Property(
 *        property="company_select", 
 *        type="string", 
 *        example="YWQzZmIyNTE4MzdiNGMxIDEyOTk3NjIxIDZkMWI0MGNjNjIzMTIxNQ==", 
 *        description="this part must taken from get-address suggessions",  
 *    ), 
 *    @OA\Property(
 *        property="vat", 
 *        type="string", 
 *        example="12345678910",
 *        description="Nullable",   
 *    ), 
 *    @OA\Property(
 *        property="registeration", 
 *        type="string", 
 *        example="123456789101",
 *        description="Nullable",    
 *    ), 
 *    @OA\Property(
 *        property="agreement", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="business_type", 
 *        type="string", 
 *        example="Shop", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Registeration Successful",
 *          @OA\JsonContent(
 *     @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Register Successful", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string", 
 *    ),     
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */


/** 
 * @OA\Post(
 *     path="/api/auth/get-addresses",
 *     summary=" Suggessions From Company Name ",
 *     tags={"Auth"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Send Company Name",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="company_name", 
 *        type="string", 
 *        example="Savoy", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Suggesion List | Use id For Company Select | Show Address to Customer",
 *          @OA\JsonContent(
 *              *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Suggessions List", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="suggestions", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="address", 
 *                    type="string", 
 *                    example="Savoycell, Unit 41, Savoy Centre, 140 Sauchiehall Street, Glasgow", 
 *                ), 
 *                @OA\Property(
 *                    property="url", 
 *                    type="string", 
 *                    example="/get/ZmM2MjZkZDQ1Mzc5MzYyIDI3MDA2NTQ2IDZkMWI0MGNjNjIzMTIxNQ==", 
 *                ), 
 *                @OA\Property(
 *                    property="id", 
 *                    type="string", 
 *                    example="ZmM2MjZkZDQ1Mzc5MzYyIDI3MDA2NTQ2IDZkMWI0MGNjNjIzMTIxNQ==", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */


/** 
 * @OA\Post(
 *     path="/api/auth/forget-password",
 *     summary=" Forget Password",
 *     tags={"Auth"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Send Your Customer Email and Get Reset Password Mail",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="email", 
 *        type="string", 
 *        example="emredemirel4196@gmail.com", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sent Email",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Reset Email Sent", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string", 
 *        example=null
 *    ),
 *          ),
 *      ),
 *     
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */





/** 
 * @OA\Post(
 *     path="/api/auth/send-verification",
 *     summary=" Re-send Verification",
 *     tags={"Auth"},
 *      @OA\RequestBody(
 *          required=true,
 *          description="Send Your Customer Email and Get Verification Mail",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="email", 
 *        type="string", 
 *        example="emredemirel4196@gmail.com", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Sent Email",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Reset Email Sent", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string", 
 *        example=null
 *    ),
 *          ),
 *      ),
 * @OA\Response(
 *          response=403,
 *          description="If User Already Verified",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean",
 *        example=false 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="This user already verified", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string", 
 *        example=null
 *    ),
 *          ),
 *      ),
 * 
 *     
 *      security={
 *          {"api_key": {}},
 * 
 *      }
 * )
 */



/** 
 * @OA\Get(
 *     path="/api/user/profile",
 *     summary=" User Profile",
 *     tags={"User"},
 *      @OA\Response(
 *          response=200,
 *          description="User Profile Result",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="id", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="name", 
 *            type="string", 
 *            example="Mr. Grady Dooley DVM", 
 *        ), 
 *        @OA\Property(
 *            property="point", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="favorites", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="orders", 
 *            type="number", 
 *        ), 
 *    ),    
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */



/** 
 * @OA\Get(
 *     path="/api/user/favorites",
 *     summary=" User Favorites",
 *     tags={"User"},
 * @OA\Parameter(
 *          name="offset",
 *          in="query",
 *          description="Limit 20 and Offset min : 0 ",
 *          required=true,
 *          @OA\Schema(type="integer",default=0)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User Favorites Result",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="name", 
 *                type="string", 
 *                example="Totam vero.", 
 *            ), 
 *            @OA\Property(
 *                property="sku", 
 *                type="string", 
 *                example="sku-12665.48", 
 *            ), 
 *            @OA\Property(
 *                property="stock", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="sale_price", 
 *                type="string", 
 *                example="35.48", 
 *            ), 
 *            @OA\Property(
 *                property="unit_price", 
 *                type="string", 
 *                example="35.48", 
 *            ), 
 *            @OA\Property(
 *                property="discount", 
 *                type="string", 
 *                example="0.00", 
 *            ), 
 *            @OA\Property(
 *                property="pack", 
 *                type="string", 
 *                example="1x20kg", 
 *            ), 
 *            @OA\Property(
 *                property="image", 
 *                type="string", 
 *                example="http://localhost/upload/product/imageholderproduct.jpg", 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */



/** 
 * @OA\Get(
 *     path="/api/user/orders",
 *     summary=" User Orders",
 *     tags={"User"},
 *      @OA\Parameter(
 *          name="offset",
 *          in="query",
 *          description="Limit 20 and Offset min : 0 ",
 *          required=true,
 *          @OA\Schema(type="integer",default=0)
 *      ),
 *      @OA\Parameter(
 *          name="status_type",
 *          in="query",
 *          description="Filter by Status",
 *          required=false,
 *          @OA\Schema(
 *              type="string",
 *              enum= {"New Order","Ready Order","Shipping Order","Completed Order"}
 *              )
 *          ),
 *      @OA\Response(
 *          response=200,
 *          description="User Orders Result",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="ordercode", 
 *                type="string", 
 *                example="SOA-HYCFWUR0BLAY", 
 *            ), 
 *            @OA\Property(
 *                property="total_price", 
 *                type="string", 
 *                example="275.52", 
 *            ), 
 *            @OA\Property(
 *                property="status", 
 *                type="string", 
 *                example="New Order", 
 *            ), 
 *            @OA\Property(
 *                property="products", 
 *                type="number", 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */



/** 
 * @OA\Get(
 *     path="/api/user/orders/{id}",
 *     summary=" User Order Detail",
 *     tags={"User"},
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="Use Order ID to Find Detail",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User Order Detail",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="id", 
 *            type="number", 
 *        ), 
 *        @OA\Property(
 *            property="ordercode", 
 *            type="string", 
 *            example="CmxUxCHhjQ2S", 
 *        ), 
 *        @OA\Property(
 *            property="cart_price", 
 *            type="string", 
 *            example="192.48", 
 *        ), 
 *        @OA\Property(
 *            property="shipment_price", 
 *            type="string", 
 *            example="0.00", 
 *        ), 
 *        @OA\Property(
 *            property="discount_price", 
 *            type="string", 
 *            example="0.00", 
 *        ), 
 *        @OA\Property(
 *            property="total_price", 
 *            type="string", 
 *            example="192.48", 
 *        ), 
 *        @OA\Property(
 *            property="pay_type", 
 *            type="string", 
 *            example="Online Payment", 
 *        ), 
 *        @OA\Property(
 *            property="pay_status", 
 *            type="string", 
 *            example="wait", 
 *        ), 
 *        @OA\Property(
 *            property="status", 
 *            type="string", 
 *            example="New Order", 
 *        ), 
 *        @OA\Property(
 *            property="notes", 
 *            type="string", 
 *            example="Sunt iste et molestiae voluptatibus qui doloremque non. Est facilis porro rerum quia. Tenetur possimus soluta eos id incidunt quo sed pariatur. Sit quisquam voluptatem nihil nihil vel. Recusandae sint saepe numquam ipsum velit harum iusto dolor. Maiores consequatur rerum reiciendis molestiae. Quia iste corporis est provident atque mollitia nesciunt laboriosam. Amet placeat ea rerum est eum ex consectetur. Libero a reiciendis hic molestiae. Dolor qui eum quas maiores. Aliquid libero molestias molestias incidunt dolorum non. Laboriosam animi impedit officiis. Ipsa cumque libero ipsum at. Voluptas sit repellat voluptatem adipisci distinctio. Neque eligendi totam numquam ad dolorum. Consectetur voluptatibus ut rerum et. Quia possimus quia qui voluptatem. Et dolorem maxime et voluptas aut autem. Fugit beatae perspiciatis amet aliquid. Quia placeat explicabo assumenda culpa. Ab provident necessitatibus tempore nihil doloremque qui.", 
 *        ), 
 *        @OA\Property(
 *            property="products", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="sold_price", 
 *                    type="string", 
 *                    example="73.68", 
 *                ), 
 *                @OA\Property(
 *                    property="quantity", 
 *                    type="string", 
 *                    example="1.00", 
 *                ), 
 *                @OA\Property(
 *                    property="product_id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Illum quia.", 
 *                ), 
 *                @OA\Property(
 *                    property="sku", 
 *                    type="string", 
 *                    example="sku-2550.27", 
 *                ), 
 *                @OA\Property(
 *                    property="pack", 
 *                    type="string", 
 *                    example="1x20kg", 
 *                ), 
 *                @OA\Property(
 *                    property="image", 
 *                    type="string", 
 *                    example="http://localhost/upload/product/imageholderproduct.jpg", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */




/** 
 * @OA\Get(
 *     path="/api/user/favorites/toggle/{id}",
 *     summary=" Toggle Favorite Product",
 *     tags={"User"},
 *     @OA\Parameter(
 *          name="id",
 *          in="query",
 *          description="If favorited, will be removed, If not favorited, will be added",
 *          required=true,
 *          @OA\Schema(type="integer",default=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Example Result",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Added", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string", 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */



/** 
 * @OA\Post(
 *     path="/api/coupon-apply",
 *     summary=" Coupon Apply",
 *     tags={"Order"},
 *     @OA\RequestBody(
 *          required=true,
 *          description="If coupon applied, Save Applied Code for After",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="coupon_code", 
 *        type="string", 
 *        example="DKmuhEA", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Coupon Applied",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Coupon Applied", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="boolean", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Coupon Declined",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Validation Error", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="coupon_code", 
 *            type="array", 
 *            @OA\Items(
 *                type="string", 
 *                example="The selected coupon code is invalid.", 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */


/** 
 * @OA\Post(
 *     path="/api/checkout-price",
 *     summary=" Checkout Page",
 *     tags={"Order"},
 *    @OA\RequestBody(
 *          required=true,
 *          description="If action is no_action everyting okay! But it is update_action turn to Cart page",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="items", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number",
 *                example=1 
 *            ), 
 *            @OA\Property(
 *                property="quantity", 
 *                type="number",
 *                example=1    
 *            ), 
 *        ), 
 *    ), 
 *    @OA\Property(
 *        property="coupon_code", 
 *        type="string", 
 *        example="VCYp3Uh", 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Everything okay",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="products", 
 *            type="object", 
 *            @OA\Property(
 *                property="action", 
 *                type="string", 
 *                example="no_action", 
 *            ), 
 *            @OA\Property(
 *                property="items", 
 *                type="array", 
 *                @OA\Items(
 *                    type="object", 
 *                    @OA\Property(
 *                        property="id", 
 *                        type="number", 
 *                    ), 
 *                    @OA\Property(
 *                        property="quantity", 
 *                        type="number", 
 *                    ), 
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="item_details", 
 *                type="array", 
 *                @OA\Items(
 *                    type="object", 
 *                    @OA\Property(
 *                        property="id", 
 *                        type="number", 
 *                    ), 
 *                    @OA\Property(
 *                        property="name", 
 *                        type="string", 
 *                        example="Ducimus dolores et.", 
 *                    ), 
 *                    @OA\Property(
 *                        property="sku", 
 *                        type="string", 
 *                        example="sku-31615.4", 
 *                    ), 
 *                    @OA\Property(
 *                        property="stock", 
 *                        type="number", 
 *                    ), 
 *                    @OA\Property(
 *                        property="sale_price", 
 *                        type="string", 
 *                        example="47.76", 
 *                    ), 
 *                    @OA\Property(
 *                        property="unit_price", 
 *                        type="string", 
 *                        example="47.76", 
 *                    ), 
 *                    @OA\Property(
 *                        property="discount", 
 *                        type="string", 
 *                        example="0.00", 
 *                    ), 
 *                    @OA\Property(
 *                        property="pack", 
 *                        type="string", 
 *                        example="1x20kg", 
 *                    ), 
 *                    @OA\Property(
 *                        property="image", 
 *                        type="string", 
 *                        example="/upload/product/imageholderproduct.jpg", 
 *                    ), 
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="updated_products", 
 *                type="array", 
 *                @OA\Items(
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="delete_products", 
 *                type="array", 
 *                @OA\Items(
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="prices", 
 *            type="object", 
 *            @OA\Property(
 *                property="cart_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="vat_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="delivery_cost", 
 *                type="string", 
 *                example="5.00", 
 *            ), 
 *            @OA\Property(
 *                property="discount_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="final_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="earn_point", 
 *                type="number", 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="address", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="dsMlpkS", 
 *                ), 
 *                @OA\Property(
 *                    property="isDefault", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="address", 
 *                    type="string", 
 *                    example="767 Collins Green Suite 603 New Waylon, NH 26612 15423", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="payments", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Online Payment", 
 *                ), 
 *                @OA\Property(
 *                    property="status", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="created_at", 
 *                    type="string", 
 *                    example="2022-01-19T14:56:43.000000Z", 
 *                ), 
 *                @OA\Property(
 *                    property="updated_at", 
 *                    type="string", 
 *                    example="2022-01-19T14:56:43.000000Z", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=202,
 *          description="Cart Need to Update",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean", 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="products", 
 *            type="object", 
 *            @OA\Property(
 *                property="action", 
 *                type="string", 
 *                example="update_cart", 
 *            ), 
 *            @OA\Property(
 *                property="items", 
 *                type="array", 
 *                @OA\Items(
 *                    type="object", 
 *                    @OA\Property(
 *                        property="id", 
 *                        type="number", 
 *                    ), 
 *                    @OA\Property(
 *                        property="quantity", 
 *                        type="number", 
 *                    ), 
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="item_details", 
 *                type="array", 
 *                @OA\Items(
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="updated_products", 
 *                type="array", 
 *                @OA\Items(
 *                    type="string", 
 *                    example="Rerum dolores repellat.-sku-11776.86", 
 *                ), 
 *            ), 
 *            @OA\Property(
 *                property="delete_products", 
 *                type="array", 
 *                @OA\Items(
 *                    type="string", 
 *                    example="Dolores aut iusto.-sku-87644.37", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="prices", 
 *            type="object", 
 *            @OA\Property(
 *                property="cart_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="vat_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="delivery_cost", 
 *                type="string", 
 *                example="5.00", 
 *            ), 
 *            @OA\Property(
 *                property="discount_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="final_cost", 
 *                type="number", 
 *            ), 
 *            @OA\Property(
 *                property="earn_point", 
 *                type="number", 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="address", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="GH0seBw", 
 *                ), 
 *                @OA\Property(
 *                    property="isDefault", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="address", 
 *                    type="string", 
 *                    example="24827 Nikolaus Stravenue Apt. 915 North Aaliyah, WA 78803 17723", 
 *                ), 
 *            ), 
 *        ), 
 *        @OA\Property(
 *            property="payments", 
 *            type="array", 
 *            @OA\Items(
 *                type="object", 
 *                @OA\Property(
 *                    property="id", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="name", 
 *                    type="string", 
 *                    example="Online Payment", 
 *                ), 
 *                @OA\Property(
 *                    property="status", 
 *                    type="number", 
 *                ), 
 *                @OA\Property(
 *                    property="created_at", 
 *                    type="string", 
 *                    example="2022-01-19T22:02:43.000000Z", 
 *                ), 
 *                @OA\Property(
 *                    property="updated_at", 
 *                    type="string", 
 *                    example="2022-01-19T22:02:43.000000Z", 
 *                ), 
 *            ), 
 *        ), 
 *    ),
 *          ),
 *      ), 
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */




/** 
 * @OA\Post(
 *     path="/api/order-request",
 *     summary=" Order Request",
 *     tags={"Order"},
 *     @OA\RequestBody(
 *          required=true,
 *          description="If process is ordercomplete everyting okay! But it is redirection need to redirect Payment page",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="items", 
 *        type="array", 
 *        @OA\Items(
 *            type="object", 
 *            @OA\Property(
 *                property="id", 
 *                type="number",
 *                example=1 
 *            ), 
 *            @OA\Property(
 *                property="quantity", 
 *                type="number",
 *                example=1  
 *            ), 
 *        ), 
 *    ), 
 *    @OA\Property(
 *        property="coupon_code", 
 *        type="string",
 *        example="" 
 *    ), 
 *    @OA\Property(
 *        property="adres_id", 
 *        type="number",
 *        example=1   
 *    ), 
 *    @OA\Property(
 *        property="payment_id", 
 *        type="number",
 *        example=1    
 *    ), 
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Order Done",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean",
 *        example=true 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        format="nullable", 
 *        type="string",
 *        example="Order Completed" 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="paymentid", 
 *            type="string", 
 *        ), 
 *        @OA\Property(
 *            property="ordernum", 
 *            type="string", 
 *            example="SOA-YTRLWJIRJBL0", 
 *        ), 
 *        @OA\Property(
 *            property="process", 
 *            type="string", 
 *            example="ordercomplete", 
 *        ), 
 *        @OA\Property(
 *            property="ordercost", 
 *            type="number", 
 *            example=275.52 
 *        ), 
 *        @OA\Property(
 *            property="earnpoint", 
 *            type="number",
 *            example=275.52  
 *        ), 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Payment Redirection",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean",
 *        example=true 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Redirected", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        type="object", 
 *        @OA\Property(
 *            property="paymentid", 
 *            type="string", 
 *            example="https://demo.vivapayments.com/web/checkout?ref=7233622698262879", 
 *        ), 
 *        @OA\Property(
 *            property="ordernum", 
 *            type="string", 
 *            example="SOA-TMZCAOBYPBWK", 
 *        ), 
 *        @OA\Property(
 *            property="process", 
 *            type="string", 
 *            example="redirection", 
 *        ), 
 *        @OA\Property(
 *            property="ordercost", 
 *            type="number", 
 *            example=275.52
 *        ), 
 *        @OA\Property(
 *            property="earnpoint", 
 *            type="number",
 *            example=275.52   
 *        ), 
 *    ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=405,
 *          description="Stock Not Enough",
 *          @OA\JsonContent(
 *    @OA\Property(
 *        property="status", 
 *        type="boolean",
 *        example=false 
 *    ), 
 *    @OA\Property(
 *        property="message", 
 *        type="string", 
 *        example="Stock Not Enough", 
 *    ), 
 *    @OA\Property(
 *        property="data", 
 *        format="nullable", 
 *        type="string",
 *        example=null 
 *    ),          
 *          ),
 *      ),
 *      security={
 *          {"api_key": {}},
 *           {"bearer_token": {}},
 * 
 *      }
 * )
 */
