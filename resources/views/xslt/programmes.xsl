<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xml.apache.org/xslt ">
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
                <title>
                    Programme
                </title>

            </head>
            <body>
                <h2></h2>
                <xsl:for-each select="/ProgrammesList/Programme">
                    <tr>
                        <td align="center">
                            <xsl:value-of select="@programme_code"/>
                        </td>
                        <td align="center">
                            <xsl:value-of select="programme_name"/>
                        </td>
                        <td align="center">
                            <xsl:value-of select="programme_desc"/>
                        </td>
                        <td align="center">
                            <xsl:value-of select="faculty" />
                        </td>
                        <td align="center">




                                <li>
                                    <a href="programmes/show" class="button primary small">View Details</a>
                                </li>



                        </td>


                    </tr>

<!--                        <lxslt:script lang="javascript">-->


<!--                            var getInput = "<xsl:value-of select="@programme_id"/>";-->
<!--                            localStorage.setItem("storageName",getInput);-->

<!--                            var progid = JSON.stringify(getInput);-->
<!--                            $.ajax({-->
<!--                            url: '/xampp/htdocs/TARUCsystem/app/Http/Controllers/programmesController.php',-->
<!--                            type: 'post',-->
<!--                            data: {id: progid},-->
<!--                            success: function(response){-->
<!--                            //do whatever.-->
<!--                            }-->


<!--                        </lxslt:script>-->

                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
