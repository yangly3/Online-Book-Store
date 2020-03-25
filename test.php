<div id="header">
    <h1>Product</h1>
</div>

<!--SEARCHING-->
        <div class="search-category">
            <form method="GET" action="Display_Product.php">
        	<select name="category">
				<option value="0">All</option>
		        <option value="1">Classic</option>
                <option value="2">Life</option>
                <option value="3">Science</option>
                <option value="4">Fiction</option>
                <option value="5">History</option>                    <     
			</select>
        <input type="submit" value="Search" id="Button1">
    	</form>			
        </div>
        <div id="product">
            <!--Display Products Category-->
            <?php
                include('Product_View.php');
            ?>
        </div>
    </body>
    <footer></footer>
</html>