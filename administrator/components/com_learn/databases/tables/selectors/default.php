<?php

class ComLearnDatabaseNosqlSelectorDefault extends KObject implements KObjectIdentifiable
{
    public $where = array();

    public function where( $property, $constraint = null, $value = null, $condition = 'AND' )
    {
        if(!empty($property)) 
        {
            $where = array();
            $where['property'] = $property;

            if(isset($constraint))
            {
                $constraint = strtoupper($constraint);
                $condition  = strtoupper($condition);
            
                $where['constraint'] = $constraint;
                $where['value']      = $value;
            }
        
            $where['condition']  = count($this->where) ? $condition : '';

            //Make sure we don't store the same where clauses twice
            $signature = md5($property.$constraint.$value);
            if(!isset($this->where[$signature])) {
                $this->where[$signature] = $where;
            }
        }
            
        return $this;
    }

    public function getIdentifier()
    {
        return $this->_identifier;
    }
}