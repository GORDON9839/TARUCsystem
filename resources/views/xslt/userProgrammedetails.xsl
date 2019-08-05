<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
                <title>
                    Programme
                </title>

            </head>
            <body>

                <div class="row">
                    <div class="col-6 col-12-xsmall">
                        <xsl:param name="progId" select=""/>
                        <xsl:for-each select="/userProgrammesList/Programme">
<!--                        <xsl:for-each select="/userProgrammesList/Programme">-->
<!--                            <ul class="alt">-->
<!--                                <li>Programme Code &#160;&#160;&#160;&#160;&#160;<xsl:value-of select="@programme_code"/></li>-->
<!--                                <li>Programme Name &#160;&#160;&#160;&#160;&#160;<xsl:value-of select="programme_name"/></li>-->
<!--                                <li>Programme Description&#160;&#160;&#160;&#160;<xsl:value-of select="programme_desc"/></li>-->
<!--                                <li>Duration(Full Time)  &#160;&#160;&#160;&#160;<xsl:value-of select="fulltime_duration"/></li>-->
<!--                                <li>Duration(Part Time)  &#160;&#160;&#160;&#160;<xsl:value-of select="parttime_duration"/></li>-->
<!--                                <li>Faculty  &#160;&#160;&#160;&#160;&#160;&#160;<xsl:value-of select="faculty"/></li>-->
<!--                                <li>Professional Certification &#160;&#160;&#160;<xsl:value-of select="profcer"/></li>-->
<!--                                <li>Minimum Entry Requirement (SPM)  &#160;&#160;<xsl:value-of select="MER_SPM"/></li>-->
<!--                                <li>Minimum Entry Requirement (STPM) &#160;&#160;<xsl:value-of select="MER_STPM"/></li>-->
<!--                                <li>Minimum Entry Requirement (UEC)  &#160;&#160;;<xsl:value-of select="MER_UEC"/></li>-->
<!--                                <li>Minimum Entry Requirement Description  &#160;<xsl:value-of select="MER_desc"/></li>-->
<!--                                <li>Fees     &#160;&#160;&#160;&#160;&#160;&#160;<xsl:value-of select="fees"/></li><br></br>-->

                            <xsl:if test="@programme_id=$">
                                <table>
                                    <tr><td align="center">Programme Name</td>
                                        <td><xsl:value-of select="programme_name"/></td></tr>

                                    <tr><td align="center">Programme Description</td>
                                    <td><xsl:value-of select="programme_desc"/></td></tr>

                                    <tr><td align="center">Duration(Full Time)</td>
                                    <td><xsl:value-of select="fulltime_duration"/></td></tr>

                                    <tr><td align="center">Duration(Part Time)</td>
                                    <td><xsl:value-of select="parttime_duration"/></td></tr>

                                    <tr><td align="center">Faculty </td>
                                    <td><xsl:value-of select="faculty"/></td></tr>

                                    <tr><td align="center">Professional Certification</td>
                                    <td><xsl:value-of select="profcer"/></td></tr>

                                    <tr><td align="center">Minimum Entry Requirement (SPM)</td>
                                    <td><xsl:value-of select="MER_SPM"/></td></tr>

                                    <tr><td align="center">Minimum Entry Requirement (STPM)</td>
                                    <td><xsl:value-of select="MER_STPM"/></td></tr>

                                    <tr><td align="center">Minimum Entry Requirement (UEC)</td>
                                    <td><xsl:value-of select="MER_UEC"/></td></tr>

                                    <tr><td align="center">Minimum Entry Requirement Description</td>
                                    <td><xsl:value-of select="MER_desc"/></td></tr>

                                    <tr><td align="center">Fees</td>
                                    <td><xsl:value-of select="fees"/></td></tr>

                                </table>
                            </xsl:if>

                        </xsl:for-each>
<!--                            </ul>-->
<!--                            &lt;!&ndash;                </xsl:if>&ndash;&gt;-->
<!--                        </xsl:for-each>-->
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
