<?php

namespace OpenCafe\Codalizer;

class ReportParser
{
    /**
     * Result of report
     *
     * @var array
     */
    protected static $result = [
        'index' => 0, 'naming' => 0, 'unused' => 0, 'codeSize' => 0
    ];

    /**
     * Total of reports
     *
     * @var integer
     */
    protected static $count = 0;

    /**
     * Make the report
     *
     * @param $xml
     * @return array
     */
    public static function make(&$xml)
    {
        foreach($xml->file as $item) {

            foreach($item->violation as $violation) {

                self::$count++;
                self::$result['index']++;

                $data = file($item->attributes()['name']);

                if( $violation['ruleset'] == 'Code Size Rules' ){
                    self::$result['codeSize']++;
                    self::parseRules('code_size', $violation, $data, $item);
                }

                if( $violation['ruleset'] == 'Naming Rules' ){
                    self::$result['naming']++;
                    self::parseRules('naming_rule', $violation, $data, $item);
                }

                if( $violation['ruleset'] == 'Unused Code Rules' ){
                    self::$result['unused']++;
                    self::parseRules('unused_rule', $violation, $data, $item);
                }

                $violation->addAttribute('id', self::$result['index']);
            }
        }

        self::$result['count'] = self::$count;

        return self::$result;
    }

    /**
     * Parse report rules
     *
     * @param $rule
     * @param $violation
     * @param $data
     * @param $item
     * @return array
     */
    protected static function parseRules($rule, $violation, $data, $item)
    {

        self::$result['details'][] = [
            'rule_name' => $rule,
            'class' => $violation['class'],
            'method' => $violation['method'],
            'where' => $item->attributes()['name'],
            'start' => $violation['beginline'],
            'end' => $violation['endline'],
            'rule' => $violation['rule'],
            'ruleset' => $violation['ruleset'],
            'package' => $violation['package'],
            'priority' => $violation['priority'],
            'id' => self::$result['index'],
            'description' => $violation,
            'data' => $data
        ];

        return self::$result;
    }

}
