<?php
//  ´æ´¢¹ý³Ì
if(!function_exists("procedure"))
{
    function procedure($sql)
    {
        $fp = dbConnect();
        $fp->multi_query($sql);
        do {
            if ($result = $fp->store_result()) {
                while ($row = $result->fetch_assoc()) {
                    $re[] = $row ;
                }
                $result->close();
            }
        } while ($fp->more_results()&&$fp->next_result());
        $fp->commit();
        return $re ;
    }
}

?>