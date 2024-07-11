<div class="counter_area overlay_03">
    <?php


                $dataInicial = '2021-06-01';
                $dataFinal = date("Y-m-d");

                $difDates = strtotime($dataFinal) - strtotime($dataInicial);
                $dias = floor($difDates / ( 60 * 60 * 24));
                
                $kmBase = 152425;
                $finalNumber = $kmBase+$dias;
                

                ?>
    <div class="d-lg-flex d-block">
        <div class="col-xl-4 col-lg-3 col-md-4 col-12">
            <div class="single_counter text-center">
                <span class="counter" id='year'>65</span>
                <p class="par">anos de história</p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-3 col-md-4 col-12">
            <div class="single_counter text-center">
                <span class="counter" id='km'></span>
                <p class="par">km de tubos flexíveis fabricados</p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-3 col-md-4 col-12">
            <div class="single_counter text-center">
                <span> + </span><span class="counter" id='clients'>12.644</span>
                <p class="par">clientes satisfeitos</p>
            </div>
        </div>
    </div>
</div>