<?php

class ComLearnDatabaseTableSelectorDefault extends KObject implements KObjectIdentifiable
{
    protected $_where = array();

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

    public function find($nodes)
    {
        $result = array();
        if (is_array($nodes) || ($nodes instanceof Traversable)) 
        {
            foreach ($nodes as $node) 
            {
                $checking = false;
                $checked = false;
                foreach ($this->_where as $condition) 
                {
                    $checking = true;
                    $property = $condition['property'];

                    if (isset($node[$property]))
                    {
                        $value = $node[$property];
                    }
                    elseif(isset($value->$property))
                    {
                        $value = $node->$property;
                    }
                    else 
                    {
                        $checking = false;
                        continue;
                    }

                    // TODO: Expand checks to not just equals on Everything
                    if ($value == $condition['value']) 
                    {
                        $checked = true;
                        continue;
                    }
                    else $checked = false;
                }

                if($checking && !$checked)
                    continue;

                $result[] = $node;
            }
        }

        return $result;
    }

    public function getIdentifier()
    {
        return $this->_identifier;
    }
}