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
                <table class="alt">
                <thead>
                    <tr>
                        <th align="center">No.</th>
                        <th align="center">Loan Name</th>
                        <th align="center">Level Of Study</th>
                        <th align="center">Loan Amount</th>
                        <th align="center">Loan Description</th>
                    </tr>
                </thead>
                <h2></h2>
                <tbody>
                    <?php ?>
                <xsl:for-each select="/LoanList/LoanDetails">
                    <tr>
                        <td aligh="center">
                            <xsl:variable name="i" select="position()"/>
                            <xsl:value-of select="$i"/>
                        </td>
                        <td align="left">
                            <xsl:value-of select="loan_name"/>
                        </td>
                        <td align="left">
                            <xsl:value-of select="level_of_study_name" />
                        </td>
                        <td align="center">
                            <xsl:value-of select="amount" />
                        </td>
                        <td align="left">
                            <xsl:value-of select="loan_desc" />
                        </td>
                    </tr>

                </xsl:for-each>
                </tbody>
                </table>
                <label><xsl:value-of select="count(/LoanList/LoanDetails)"/> loan record(s).</label>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
