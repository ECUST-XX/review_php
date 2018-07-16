<?php
// TODO:还是没看太懂
// 目前只知道这东西效率高，而且只能向前，不能回退，只能通过再次调用来多次迭代

//function logger($fileName) {
//    $fileHandle = fopen($fileName, 'a');
//    while (true) {
//        fwrite($fileHandle, yield . "\n");
//    }
//}
//
//$logger = logger(__DIR__ . '/log');
//$logger->send('Foo');
//$logger->send('Bar');
//
//function gen() {
//    $ret = (yield 'yield1');
//    var_dump('ppppp',$ret);
//    $ret = (yield 'yield2');
//    var_dump('qqqqq',$ret);
//}
//
//$gen = gen();
//var_dump("\n\n{$gen->key()}----\n\n",$gen->current());
//var_dump($gen->send('ret1')); // string(4) "ret1"   (the first var_dump in gen)
//var_dump("\n\n{$gen->key()}----\n\n",$gen->current());
//
//var_dump($gen->send('ret2'));
//var_dump("\n\n{$gen->key()}----\n\n",$gen->current());
//
//var_dump($gen->send('ret3'));
//var_dump("\n\n{$gen->key()}----\n\n",$gen->current());
//$n= 1;
//$gen->rewind();
//foreach ($gen as $key=>$value){
//    echo $key,"+++++++++++",$value,"\n";
//    echo "------",$n;
//    $n++;
//
//}


