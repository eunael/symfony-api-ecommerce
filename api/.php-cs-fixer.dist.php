<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@Symfony' => true,
        '@PSR12' => true,

        // Add a single space after each comma delimiter
        'no_whitespace_before_comma_in_array' => true,
        'whitespace_after_comma_in_array' => ['ensure_single_space' => true],

        // Add a single space around binary operators (except concatenation)
        'binary_operator_spaces' => [
            'default' => 'single_space',
            // 'operators' => [
            //     // '.' => 'no_space', // No space around concatenation operator
            //     // '=>' => 'single_space',
            // ],
        ],

        // Place unary operators adjacent to the affected variable
        'not_operator_with_successor_space' => false,
        'unary_operator_spaces' => true,

        // Always use identical comparison unless you need type juggling
        'strict_comparison' => true,

        // Use Yoda conditions
        'yoda_style' => [
            'equal' => true,
            'identical' => true,
            'less_and_greater' => false,
        ],

        // Add a comma after each array item in a multi-line array
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters'],
        ],

        // Add a blank line before return statements
        'blank_line_before_statement' => [
            'statements' => ['return'],
        ],

        // Use return null; when explicitly returning null
        'simplified_null_return' => false,
        'return_assignment' => false,

        // Use braces for control structures
        'braces_position' => [
            'control_structures_opening_brace' => 'same_line',
            'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_functions_opening_brace' => 'same_line',
            'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'allow_single_line_empty_anonymous_classes' => false,
            'allow_single_line_anonymous_functions' => false,
        ],

        // One class per file
        'single_class_element_per_statement' => true,

        // Class declaration on same line
        'single_line_after_imports' => true,
        'class_definition' => [
            'single_line' => true,
            'single_item_single_line' => true,
        ],

        // Declare class properties before methods
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'case',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'phpunit',
                'method_public',
                'method_protected',
                'method_private',
            ],
            'sort_algorithm' => 'none',
        ],

        // Use parentheses when instantiating classes
        'new_with_parentheses' => true,

        // No else after return/throw
        'no_useless_else' => true,
        'no_superfluous_elseif' => true,

        // No spaces around array offset accessor
        'no_spaces_around_offset' => [
            'positions' => ['inside', 'outside'],
        ],

        // Add use statement for every class
        'no_unused_imports' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'function', 'const'],
        ],
        'single_import_per_statement' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],

        // PHPDoc types - null at the end
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'none',
        ],

        // Additional Symfony coding standards
        'array_syntax' => ['syntax' => 'short'],
        'concat_space' => ['spacing' => 'none'],
        'declare_strict_types' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
            'scope' => 'namespaced',
        ],
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'allow_unused_params' => false,
            'remove_inheritdoc' => false,
        ],
        'php_unit_method_casing' => ['case' => 'camel_case'],
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_order' => true,
        'phpdoc_separation' => true,
        'phpdoc_summary' => true,
        'phpdoc_trim' => true,
        'protected_to_private' => true,
        'self_accessor' => true,
        'single_quote' => true,
        'standardize_not_equals' => true,
        'ternary_operator_spaces' => true,
        'trim_array_spaces' => true,
        'void_return' => false, // Don't enforce void in tests

        // Exception and error handling
        'no_useless_sprintf' => false, // We want to use sprintf for messages

        // Additional rules for code quality
        'explicit_indirect_variable' => true,
        'explicit_string_variable' => true,
        'no_alternative_syntax' => true,
        'no_mixed_echo_print' => ['use' => 'echo'],
        'no_short_bool_cast' => true,
        'no_trailing_comma_in_singleline' => true,
        'no_unneeded_control_parentheses' => true,
        'no_unneeded_braces' => true,
        'no_useless_return' => true,
        'object_operator_without_whitespace' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_var_without_name' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'single_line_throw' => false,
        'standardize_increment' => true,

        // Strict types
        'strict_param' => true,

        // Nullable type declaration
        'nullable_type_declaration_for_default_null_value' => true,

        // Method argument space
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
            'after_heredoc' => false,
        ],

        // Control structure continuation position
        'control_structure_continuation_position' => ['position' => 'same_line'],

        // Empty loop body
        'empty_loop_body' => ['style' => 'braces'],

        // Empty loop condition
        'empty_loop_condition' => ['style' => 'while'],

        // Get class to ::class
        'get_class_to_class_keyword' => false, // We use get_debug_type() instead

        // Lambda not used import
        'lambda_not_used_import' => true,

        // Modernize types casting
        'modernize_types_casting' => true,

        // No unset cast
        'no_unset_cast' => true,

        // Nullable type declaration
        'nullable_type_declaration' => ['syntax' => 'question_mark'],
    ])
    ->setFinder($finder)
;
