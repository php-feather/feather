<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Feather App</title>
        <meta charset="UTF-8">
        <meta name="description" content="Feather Ignite. A lightweight, super fast PHP framework.">
        <meta name="keywords" content="Feather, Feather App, Feather Ignite, PHP, PHP framework, Open Source,Php Feather, PHP Development Framework">
        <meta name="author" content="F Carbah, PHP-Feather">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .code pre{margin-bottom:0.65em;font-size:0.8em;}
            .font-12{font-size:12px;}
        </style>
    </head>
    
    <body>
        
        <div class="container-fluid vh-100">
            
            
            <div class="row h-100">
                <div class="col-md-8 my-auto mx-auto text-center">
                    
                    <h1 class="display-1">Feather {<img src="<?=asset('img/feather2.png')?>" alt="feather" title="feather" style="width:64px;"/>}</h1>
                    <h4 class="display-4">A lightweight, super fast PHP Framework</h4>
                    <h6 class="text-muted mb-1 font-12"><small>Development Framework by <em>PHP-FEATHER</em></small></h6>
                    
                    <div class="card mb-1">
                        
                        <div class="row no-gutters align-items-center">
                            
                            <div class="col-md-5">
                              <img src="<?= asset('img/index.png')?>" class="card-img" alt="Feather app" title="Feather app">
                            </div>
                            
                            <div class="col-md-7">
                                
                                <div class="card-body text-left code">
                                    
                                    <pre class=""><code>use Feather\Ignite\App;</code></pre>
                                    <pre class=""><code>use Feather\View\Engine\NativeEngine;</code></pre>
                                    <pre class="font-14">...<br/>...</pre>
                                    <pre class="text-truncate"><code>App::setBasePaths($basePath,$configPath,$logPath,...);</code></pre>

                                    <pre class=""><code>App::startSession();</code></pre>

                                    <pre class=""><code>$app = App::getInstance();</code></pre>
                                         
                                    <pre class=""><code><var>$app->boot($requireFiles);</var></code></pre>

                                    <pre class="font-14">...<br/>...</pre>
                                    
                                    <pre class="text-truncate"><code>$app->registerViewEngine('native', NativeEngine::getInstance($viewsPath, $viewsCachePath));</code></pre>
                                    
                                    <pre><code>...<br/>...</code></pre>
                                    
                                    <pre><code>$app->run();</code></pre>
                                    
                                    <pre><code>$app->end()</code></pre>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="fixed-bottom col text-muted my-2">
                    <small>&COPY; 2019 - <?=date('Y')?> PHP-FEATHER<sup>&trade;</sup></small>
                </div>
            </div>
            
        </div>
        
    </body>
    
</html>
